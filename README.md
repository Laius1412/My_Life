# I. Giới thiệu

## 1. Tên dự án: My Life 

👨‍💻 Cao Mậu Thành Đạt

## 2. Mô tả:

- Trang web dành cho cá nhân sử dụng với các chức năng to-do list, viết nhật kí, thời gian biểu, lưu trữ thành tích, kỉ niệm.

- Người dùng đăng ký tài khoản, vì đây là trang web cá nhân nên chỉ được 1 tài khoản duy nhất trong cơ sở dữ liệu.

- Đăng nhập và sử dụng các chức năng như:
  + Lên list công việc cần thực hiện
  + Lên lịch thời gian biểu trong một tuần
  + Viết nhật kí hàng ngày
  + Lưu trữ thành tích, kỉ niệm

# II. Chức năng

## 1. Sơ đồ khối (Structural Diagram)

![image](https://github.com/user-attachments/assets/08ee0b6f-a547-427c-9dcf-2724e157bd48)

## 2. Sơ đồ thuật toán (Behavioral Diagram)

### 2.1. Đăng nhập/Đăng ký

![image](https://github.com/user-attachments/assets/0aedceb6-ae36-4543-998c-c24117b53b90)

### 2.2. Todo List

![image](https://github.com/user-attachments/assets/dc06b108-b169-458c-93b2-875f5f731e76)

### 2.3. Time table

![image](https://github.com/user-attachments/assets/82c4f595-ff25-41d8-8182-9f806fddf6c8)

### 2.4. Memories

![image](https://github.com/user-attachments/assets/c0c2eabb-e0c3-4727-bd5c-75d18d91651d)

### 2.5. Diary

![image](https://github.com/user-attachments/assets/bf7802c2-23e7-4607-987e-330a829da0a4)


# III. Công nghệ (Technologies)

- Dùng PHP Laravel Framework

- Front-end: HTML, CSS, JS, Bootstrap, Fontawesome

- Database: Aiven MySQL, Cloudinary 

# IV. Cài đặt (Installation)
```
composer create-project --prefer-dist laravel/laravel My_Life
php artisan serve
```

# V. Triển khai (Deployment)

[Deployment Link](https://mylife-production-d6b8.up.railway.app/)



