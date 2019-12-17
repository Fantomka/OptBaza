from locust import HttpLocust
from UserBehavior import UserBehavior


class WebsiteUser(HttpLocust):
    task_set = UserBehavior
    min_wait = 5000
    max_wait = 9000
