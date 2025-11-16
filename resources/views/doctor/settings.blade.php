@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>إعدادات الحجز</h3>
    </div>
    <div class="card-body">

        {{-- لعرض رسالة النجاح --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- تحديث النموذج --}}
        <form action="{{ route('doctor.settings.store') }}" method="POST">
            @csrf

            {{-- باقي حقول النموذج ... --}}
            <div class="mb-3">
                <label for="work_start_time" class="form-label">وقت بدء استقبال الحجوزات</label>
                <input type="time" class="form-control" id="work_start_time" name="work_start_time">
            </div>

            <div class="mb-3">
                <label for="work_end_time" class="form-label">وقت انتهاء استقبال الحجوزات</label>
                <input type="time" class="form-control" id="work_end_time" name="work_end_time">
            </div>

            <div class="mb-3">
                <label for="is_booking_enabled" class="form-label">حالة الحجز اليومي</label>
                <select class="form-select" id="is_booking_enabled" name="is_booking_enabled">
                    <option value="1">مفتوح</option>
                    <option value="0">مغلق</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
        </form>

    </div>
</div>
@endsection