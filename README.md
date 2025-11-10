# 📦 Laravel API Test

## 🧾 وصف المهمة
API واحدة لتغيير حالة الطلب إلى **paid** وتحديث **رصيد النقاط** للمستخدم في خطوة واحدة باستخدام **Transaction** و**Validation**.

---

## ⚙️ المتطلبات
- PHP >= 8.2  
- Composer  
- Laravel 11  
- قاعدة بيانات MySQL أو SQLite

---

## 🚀 خطوات التشغيل

1. **انسخ المشروع**
   ```bash
   git clone https://github.com/YOUR_USERNAME/laravel-api-test.git
   cd laravel-api-test
   ```

2. **ثبّت الحزم**
   ```bash
   composer install
   ```

3. **أنشئ ملف البيئة**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **أضف إعدادات قاعدة البيانات** في ملف `.env` (اسم قاعدة البيانات، المستخدم، كلمة السر).

5. **شغّل المايجريشن مع البيانات الوهمية**
   ```bash
   php artisan migrate:fresh --seed
   ```

6. **شغّل السيرفر**
   ```bash
   php artisan serve
   ```

---

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

---

## 🧰 ملاحظات تقنية
- الكود يستخدم **Transactions** لحماية البيانات في حال حدوث خطأ.
- التحقق يتم عن طريق **Validator**.
- تم إنشاء بيانات وهمية تلقائيًا عبر **Factories وSeeders**.
