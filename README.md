# Laravel API Test

## 🧪 اختبار الـ API

**الـ Endpoint:**

```
POST http://127.0.0.1:8000/api/orders/{order_id}/pay
```

### ✅ في حالة النجاح:

```json
{
    "message": "Order paid successfully.",
    "order": {
        "id": 6,
        "user_id": 2,
        "total_price": "64.00",
        "status": "paid",
        "created_at": "2025-11-10T13:01:33.000000Z",
        "updated_at": "2025-11-10T13:16:47.000000Z",
        "user": {
            "id": 2,
            "name": "Brandy Waters Jr.",
            "email": "cmante@example.org",
            "points": 467,
            "created_at": "2025-11-10T13:01:33.000000Z",
            "updated_at": "2025-11-10T13:16:47.000000Z"
        }
    },
    "user_points": 467
}
```

### ⚠️ في حالة الخطأ:

#### 1. إذا كان الـ order غير موجود:

```json
{
    "message": "Validation error.",
    "errors": {
        "order_id": ["The selected order id is invalid."]
    }
}
```

#### 2. إذا لم تكن حالة الطلب `pending`:

```json
{
    "message": "Order status must be pending to be paid."
}
```
