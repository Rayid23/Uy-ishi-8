<?php

use App\Controllers\AdminController;
use App\Controllers\AuthController;
use App\Controllers\ErrorController;
use App\Controllers\TaskController;
use App\Controllers\UserController;
use App\Routes\Route;

#--------------------Авторизация-----------------------------------
Route::get("/", [AuthController::class,"loginPage"]); #Старница Логина
Route::get("/register", [AuthController::class,"registerPage"]); #Старница Регистрации
Route::get("/logout", [AuthController::class,"logout"]); #Старница Регистрации
Route::post("/login", [AuthController::class,"login"]); #Проверка
Route::post("/register", [AuthController::class,"register"]); #Добавить нового пользователя
#--------------------Ошибки-----------------------------------
Route::get("/404", [ErrorController::class,"error404"]); #404 Ошибка Нет такой страницы
Route::get("/403", [ErrorController::class,"error403"]); #403 Ошибка Нет разрещение на вход
#--------------------Админ панель-----------------------------------
Route::get("/adminTrello", [AdminController::class,"trello"]); #Панель Админа
Route::post("/adminTrello", [AdminController::class,"trello"]); #Панель Админа фильтрация
Route::get("/AdminDispetcher", [AdminController::class,"dispetcher"]); #Панель Диспетчер задач Админа 
                                                                                       #Добавление задачы
Route::get("/AdminController", [AdminController::class,"controller"]); #Панель Контроль задач Админа 
Route::post("/AdminReports", [AdminController::class,"reports"]); #Панель Контроль задач Админа 
Route::get("/UserTrello", [AdminController::class,"UserTrello"]); #Панель Пользователя для Админа
Route::post("/UserTrello", [AdminController::class,"UserTrello"]); #Панель Пользователя c фильтрацией для Админа
Route::get("/AdminGalery", [AdminController::class,"galery"]); #Галерия пользователя
#--------------------Панель Пользователя-----------------------------------
Route::get("/userReceived", [UserController::class,"kanban"]); #Панель Пользователя все задачи
Route::get("/UserGalery", [UserController::class,"galery"]); #Галерия пользователя
Route::post("/UpdateStatusUser", [UserController::class,"update"]); #Обновление статуса пользователя
#--------------------Работа с Задачами-----------------------------------
Route::post("/NewTask", [TaskController::class,"create"]); #Панель Пользователя все задачи
Route::post("/UpdateStatusTask", [TaskController::class,"update"]); #Обновление статуса пользователя
Route::post("/AddMessageTask", [TaskController::class,"update"]); #Обновление готовых задач
Route::post("/DeleteTask", [TaskController::class,"update"]); #Обновление готовых задач в случаи отказа!
Route::post("/UpdateTask", [TaskController::class,"update"]); #Обновление задачи пользователя
Route::post("/DeletedTask", [TaskController::class,"delete"]); #Удаление задачи пользователя
// Route::post("/statusUpdateReady", [TaskController::class,"update"]); #Панель Пользователя все задачи



?>