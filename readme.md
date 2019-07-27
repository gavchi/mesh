# mesh
Test work

## HTTP API

**Категории**

Список категорий в виде дерева
``` http
GET /api/category
```
Создание категории
``` http
POST /api/category
```
Отображение категории
``` http
GET /api/category/{id}
```
Обновление категории
``` http
PUT /api/category/{id}
```
Удаление категории
``` http
DELETE /api/category/{id}
```
Список товаров в категории
``` http
GET /category/{id}/products
```

---

**Товары**

Создание товара в категории
``` http
POST /category/{id}/product
```
Отображение товара
``` http
GET /product/{id}
```
Обновление товара
``` http
PUT /product/{id}
```
Удаление товара
``` http
DELETE /product/{id}
```

