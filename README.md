# Laravel API Test

## 🧪 How to Test the API

**Endpoint:**

```
POST http://127.0.0.1:8000/api/orders/{order_id}/pay
```

### ✅ Success Response:

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

### ⚠️ Error Responses:

#### 1. When the order ID does not exist:

```json
{
    "message": "Validation error.",
    "errors": {
        "order_id": ["The selected order id is invalid."]
    }
}
```

#### 2. When the order status is not `pending`:

```json
{
    "message": "Order status must be pending to be paid."
}
```
