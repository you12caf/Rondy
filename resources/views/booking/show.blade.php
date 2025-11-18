<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حجز موعد</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>حجز موعد لدى عيادة {{ $doctor->clinic_name }}</h3>
                        <p class="mb-0">أهلاً بك، يرجى تعبئة البيانات التالية للحصول على دورك لليوم.</p>
                    </div>
                    <div class="card-body">
                       <form action="{{ route('public.booking.store', $doctor->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="patient_name" class="form-label">الاسم الكامل</label>
                                <input type="text" class="form-control" id="patient_name" name="patient_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="patient_phone" class="form-label">رقم الهاتف</label>
                                <input type="tel" class="form-control" id="patient_phone" name="patient_phone" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">احجز الآن</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>