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
UserBehavior.py - класс поведения пользователя.
"""
from locust import TaskSet, task
from flask import jsonify


class FlowException(Exception):
    pass


class UserBehavior(TaskSet):
    def on_start(self):
        self.client.post("/login", {"username": "ellen_key"})

    def on_stop(self):
        self.client.post("/logout", {"username": "ellen_key"})

    @task(4)
    def get_products(self):
        self.client.get('/home/store')

    @task(2)
    def providers(self):
        self.client.get("/providers")

    @task(2)
    def get_all_profile(self):
        self.client.get("/providers/all")

    @task(2)
    def check_menu(self):
        self.client.get("/object")

    @task(2)
    def get_provider(self):
        self.client.get("/object/provider")

    @task(2)
    def get_lower_price(self):
        test_json = jsonify({'Федотова Домна Богдановна': 5134, 'Никифорова Тереза Богдановна': 287})
        with self.client.get("/object/lower", catch_response=True) as response:
            if response.status_code == 200:
                if response.json() == test_json:
                    response.success()
                else:
                    response.failure(f'Неправильные возвращаемые значения')
            else:
                response.failure(f'Код статуса {response.status_code}')

    @task(3)
    def check_flow(self):

        # step 1
        new_post = {'userId': 1, 'title': 'my shiny new post', 'body': 'hello everybody'}
        post_response = self.client.post('/posts', json=new_post)
        if post_response.status_code != 201:
            raise FlowException('post not created')
        post_id = post_response.json().get('id')

        # step 2
        new_comment = {
            "postId": post_id,
            "name": "my comment",
            "email": "test@user.habr",
            "body": "Author is cool. Some text. Hello world!"
        }

        comment_response = self.client.post('/comments', json=new_comment)
        if comment_response.status_code != 201:
            raise FlowException('comment not created')
        comment_id = comment_response.json().get('id')

        # step 3
        self.client.get(f'/comments/{comment_id}', name='/comments/[id]')
        if comment_response.status_code != 200:
            raise FlowException('comment not read')
