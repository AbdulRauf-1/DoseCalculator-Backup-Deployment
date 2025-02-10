<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Dose Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container">
        <h2 class="mb-4">Medicine Dose Calculator</h2>
        <form method="POST" action="{{ route('calculate') }}">
            @csrf
            <div class="mb-3">
                <label for="weight" class="form-label">Patient Weight (kg):</label>
                <input type="number" id="weight" name="weight" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Medicine Category:</label>
                <input type="text" id="category" name="category" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="dose_per_kg" class="form-label">Dose per kg (mg):</label>
                <input type="number" id="dose_per_kg" name="dose_per_kg" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="frequency" class="form-label">Frequency (times/day):</label>
                <input type="number" id="frequency" name="frequency" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Duration (days):</label>
                <input type="number" id="duration" name="duration" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="route" class="form-label">Route of Administration:</label>
                <select id="route" name="route" class="form-control" required>
                    <option value="Oral">Oral</option>
                    <option value="IV">IV</option>
                    <option value="IM">IM</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="dose_time" class="form-label">Dose Timing:</label>
                <select id="dose_time" name="dose_time" class="form-control" required>
                    <option value="OD">Once Daily (OD)</option>
                    <option value="BD">Twice Daily (BD)</option>
                    <option value="TDS">Three Times Daily (TDS)</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type of Medicine:</label>
                <select id="type" name="type" class="form-control" required>
                    <option value="Tablet">Tablet</option>
                    <option value="Injection">Injection</option>
                    <option value="Syrup">Syrup</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>

        @if(isset($totalDailyDose) && isset($totalDose))
            <hr>
            <h4>Calculation Results</h4>
            <p><strong>Category:</strong> {{ $category }}</p>
            <p><strong>Type:</strong> {{ $type }}</p>
            <p><strong>Route:</strong> {{ $route }}</p>
            <p><strong>Dose Timing:</strong> {{ $doseTime }}</p>
            <p><strong>Daily Dose:</strong> {{ $totalDailyDose }} mg/day</p>
            <p><strong>Total Dose ({{ $duration }} days):</strong> {{ $totalDose }} mg</p>
        @endif
    </div>
</body>
</html>
