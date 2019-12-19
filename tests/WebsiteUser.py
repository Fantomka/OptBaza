<<<<<<< Updated upstream
"""
Нагрузочное тестирование проекта-сайта по предмету
Инфокомуникационные системы и сети

Курсовой проект по профессиональному модулю МДК 01.02 Прикладное программирование
по теме “Результаты нагрузочного тестирование программного обеспечения”:
Язык: Python 3.6
Среда: PyCharm
Название программы: UserBehavior.py
Разработал: Симаньков А.В.
Дата: 17.12.2019
Версия: v 1.0

Задание:
Разработать программное нагрузочное тестирование ПО

Класс:
WebsiteUser.py - класс пользователя.
"""
from locust import HttpLocust
from UserBehavior import UserBehavior


class WebsiteUser(HttpLocust):
    task_set = UserBehavior
    min_wait = 5000
    max_wait = 9000
=======
from locust import HttpLocust
from UserBehavior import UserBehavior


class WebsiteUser(HttpLocust):
    task_set = UserBehavior
    min_wait = 5000
    max_wait = 9000
>>>>>>> Stashed changes
