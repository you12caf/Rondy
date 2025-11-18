<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تم الحجز بنجاح</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header bg-success text-white">
                        <h3>تم الحجز بنجاح!</h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">مرحباً بك، {{ $appointment->patient_name }}</h5>
                        <p class="card-text">لقد تم تسجيل موعدك بنجاح. يرجى الاحتفاظ بالمعلومات التالية:</p>
                        <div class="alert alert-info">
                            <h2>رقم الدور الخاص بك هو:</h2>
                            <h1 class="display-1">{{ $appointment->ticket_number }}</h1>
                        </div>
                        <p>يرجى التوجه إلى العيادة وانتظار دورك.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>