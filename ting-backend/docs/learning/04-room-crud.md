# Room CRUD — Step 2: Migration

## Status

DONE

## 1. What

Membuat migration untuk tabel `rooms`.

Migration digunakan untuk mendefinisikan struktur tabel Room di database menggunakan Laravel Schema Builder.

## 2. Why

Hotel dapat memiliki banyak room, sehingga Room membutuhkan tabel sendiri.

Setiap Room harus mengetahui hotel yang memilikinya. Karena itu tabel `rooms` memiliki `hotel_id` sebagai foreign key yang mengarah ke `hotels.id`.

Relationship:

User → Hotel → Room

* User memiliki banyak Hotel.
* Hotel memiliki banyak Room.
* Room dimiliki oleh satu Hotel.

## 3. Database Structure

Table: `rooms`

| Column        | Type             | Purpose                       |
| ------------- | ---------------- | ----------------------------- |
| `id`          | bigint           | Primary key                   |
| `hotel_id`    | foreign key      | Menentukan hotel pemilik room |
| `name`        | string           | Nama/tipe room                |
| `description` | text             | Deskripsi room                |
| `price`       | decimal(12,2)    | Harga room                    |
| `capacity`    | unsigned integer | Kapasitas maksimal tamu       |
| `status`      | string           | Status room                   |
| `created_at`  | timestamp        | Waktu dibuat                  |
| `updated_at`  | timestamp        | Waktu diperbarui              |

## 4. Important Engineering Decisions

### `hotel_id`

```php
$table->foreignId('hotel_id')
    ->constrained('hotels')
    ->cascadeOnDelete();
```

`hotel_id` digunakan sebagai foreign key yang menghubungkan Room dengan Hotel.

`cascadeOnDelete()` digunakan supaya ketika sebuah Hotel dihapus, Room yang dimiliki Hotel tersebut ikut dihapus.

Hal ini sesuai dengan ownership:

Hotel → Rooms

Jika Hotel tidak ada, Room tersebut juga tidak memiliki parent.

### `price`

```php
$table->decimal('price', 12, 2);
```

Harga menggunakan `decimal`, bukan `string`, karena field ini menyimpan nilai numerik.

Dua digit terakhir digunakan untuk nilai desimal.

Contoh:

`750000.00`

### `capacity`

```php
$table->unsignedInteger('capacity');
```

Capacity tidak boleh bernilai negatif, sehingga menggunakan unsigned integer.

### `status`

```php
$table->string('status')->default('available');
```

Status menggunakan string agar masih fleksibel dan belum dikunci menjadi enum.

Default status Room ketika dibuat adalah `available`.

## 5. Request Flow

Pada tahap migration belum ada HTTP request.

Flow tahap ini:

Database Design
→ Migration
→ `rooms` table
→ Foreign Key `hotel_id`

## 6. File yang Terlibat

Migration:

```text
database/migrations/xxxx_xx_xx_xxxxxx_create_rooms_table.php
```

Migration ini bertanggung jawab terhadap struktur database, bukan business logic.

## 7. Result

Migration berhasil dijalankan menggunakan:

```bash
php artisan migrate
```

Table `rooms` berhasil dibuat dengan struktur yang sudah ditentukan.

## 8. Next Step

NEXT → Step 3 — Room Model

Pada step berikutnya:

1. Membuat `Room` model.
2. Menentukan `$fillable`.
3. Menghubungkan `Room` dengan `Hotel`.
4. Menentukan relationship `belongsTo`.

Expected relationship:

```text
Hotel
 └── hasMany(Room)

Room
 └── belongsTo(Hotel)
```
