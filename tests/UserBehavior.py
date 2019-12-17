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
class_matrix.py - класс матрица, хранящая в себе все необходимые данные и
весь необходимый функционал.

Использованные переменные:
matrix - объект класса Matrix;
answer - решение пользователя, какой метод использовать.
"""
from locust import TaskSet, task


class FlowException(Exception):
    pass


class UserBehavior(TaskSet):
    # def on_start(self):
    #     self.client.post("/login", {"username": "ellen_key", "password": "education"})
    #
    # def on_stop(self):
    #     self.client.post("/logout", {"username": "ellen_key", "password": "education"})

    @task(1)
    def index(self):
        self.client.get('/store')

    @task(2)
    def profile(self):
        self.client.get("/providers")

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
