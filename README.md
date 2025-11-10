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
        "id": 1,
        "user_id": 1,
        "total_price": "120.00",
        "status": "paid"
    },
    "user_points": 130
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
