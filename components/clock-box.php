<div class="clock-box">
    <h3>When last refresh Clock</h3>
    <?php
    date_default_timezone_set('Asia/Manila');
    ?>

    <p><?php echo date('h:i:s A'); ?></p>
    <p><?php echo date('l, F j, Y'); ?></p>

    <h3>Dynamic Clock</h3>
    <p id="clock-time"></p>
    <p id="clock-date"></p>

    <?php
    // Define daily schedule (24-hour format)
    $schedule = [
        ["name" => "Breakfast", "time" => "07:30"],
        ["name" => "Lunch", "time" => "12:00"],
        ["name" => "Snack", "time" => "15:30"],
        ["name" => "Dinner", "time" => "19:00"],
    ];

    $now = new DateTime();

    $nextEvent = null;
    foreach ($schedule as $event) {
        $eventTime = DateTime::createFromFormat('H:i', $event['time']);
        $eventTime->setDate($now->format('Y'), $now->format('m'), $now->format('d'));
        if ($eventTime > $now) {
            $nextEvent = [
                'name' => $event['name'],
                'datetime' => $eventTime->format('Y-m-d H:i:s'),
            ];
            break;
        }
    }

    if (!$nextEvent) {
        $event = $schedule[0];
        $eventTime = DateTime::createFromFormat('H:i', $event['time']);
        $eventTime->setDate($now->format('Y'), $now->format('m'), $now->format('d'));
        $eventTime->modify('+1 day');
        $nextEvent = [
            'name' => $event['name'],
            'datetime' => $eventTime->format('Y-m-d H:i:s'),
        ];
    }
    ?>

    <h3>Next Scheduled Meal</h3>
    <p id="next-event-name"><?= htmlspecialchars($nextEvent['name']) ?> at <?= date('h:i A', strtotime($nextEvent['datetime'])) ?></p>
    <p id="countdown-timer"></p>
</div>

<script>
function updateClock() {
    const now = new Date();
    const time = now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    const date = now.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });

    document.getElementById('clock-time').textContent = time;
    document.getElementById('clock-date').textContent = date;
}

const nextEvent = <?= json_encode($nextEvent) ?>;

function updateCountdown() {
    const now = new Date();
    const eventDate = new Date(nextEvent.datetime.replace(' ', 'T'));

    const diff = eventDate - now;

    if (diff <= 0) {
        document.getElementById('countdown-timer').textContent = "Event started!";
        return;
    }

    const diffSeconds = Math.floor(diff / 1000);
    const hoursLeft = Math.floor(diffSeconds / 3600);
    const minutesLeft = Math.floor((diffSeconds % 3600) / 60);
    const secondsLeft = diffSeconds % 60;

    const countdownText = `${hoursLeft}h ${minutesLeft}m ${secondsLeft}s remaining`;
    document.getElementById('countdown-timer').textContent = countdownText;
}

// Run once on page load
updateClock();
updateCountdown();

// Update every second
setInterval(() => {
    updateClock();
    updateCountdown();
}, 1000);
</script>

