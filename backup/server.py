# -*- coding: utf-8 -*-
"""
REST API
Правила работы сервера по обработке клиентских запросов
 Не отвечаем за данные
 Отвечаем за ресурсы
 Запросы не зависят друг от друга

Каждый сервер имеет ресурс,
каждый ресурс имеет возможность взаимодействовать только со своими
или близкими ему ресурсуами

############### OptBaza ENDPOINTS MAP #############

RES 1 (HOMEPAGE)
    GET /                                  - домашняя страница
RES 2 (STORE)
    GET /store                             - список товаров (магазин)
    GET /store/<string:product_name>       - товар
    GET /store/sequences/price_not_changed           - товары, цены которых не менялись
    GET /store/sequences/instrument                  - цена его
RES 3 (PROVIDER)
    GET /providers                         - поставщики
    GET /providers/<string:provider_name>  - поставщик
    GET /providers/sequences/sends_all               - поставщики, которые поставляют всё
    GET /providers/sequences/mouse_kovr              - поставщик, который продает дешевле


"""
from flask import Flask, jsonify

APP = Flask(__name__)

PRODUCTS = {
    '1': {
        'name': 'instument1',
        'items': [
            {
                'count': 52,
                'si_unit': 'шт',
                'price': 672,
                'about': 'this instrument is good enough'
            }
        ]
    },
    '2': {
        'name': 'instrument2',
        'items': [
            {
                'count': 12,
                'si_unit': 'liter',
                'price': 6424,
                'about': 'this is expensive thing'
            }
        ]
    },
    '3': {
        'name': 'instrument3',
        'items': [
            {
                'count': 512,
                'si_unit': 'kg',
                'price': 123,
                'about': 'this thing is cool'
            }
        ]
    }
}

PROVIDERS = {
    'kod': {
        'fio': 'vasgen abdulov sharapov',
        'contact': {
            'address': 'sq kukuevo h marakueb',
            'phone': '8-800-555-35-35',
            'nomer_scheta': '1234 5678 1234 5678'
        },
        'postavka': {
            'srok': 6,
            'count products': 1600
        }
    }
}


# RES 1 (HOMEPAGE)
#     GET /                                  - домашняя страница
@APP.route('/', methods=['GET'])
def homepage():
    """
    # RES 1 (HOMEPAGE)
    #     GET /                                  - домашняя страница
    """
    return """<h1>Hello darkness my old friend</h1>"""


# RES 2 (STORE)
#     GET /store                             - список товаров (магазин)
@APP.route('/store', methods=['GET'])
def store_get():
    """
    # RES 2 (STORE)
    #     GET /store                             - список товаров (магазин)
    """
    return jsonify({'products': PRODUCTS}), 200


#     GET /store/<string:product_name>       - товар
@APP.route('/store/<string:product_name>', methods=['GET'])
def product(product_name):
    """
    #     GET /store/<string:product_name>       - товар
    """
    return jsonify({'product_name': PRODUCTS[product_name]}), 200


#     GET /store/sequences/price_not_changed           - товары, цены которых не менялись
@APP.route('/store/sequences/price_not_changed', methods=['GET'])
def product_price_not_changed():
    """
    #     GET /store/sequences/price_not_changed           - товары, цены которых не менялись
    """
    return jsonify({'products': PRODUCTS}), 200


#     GET /store/sequences/instrument                  - цена его
@APP.route('/store/sequences/instrument', methods=['GET'])
def product_instrument():
    """
    #     GET /store/sequences/instrument                  - цена его
    """
    return jsonify({'product_name': PRODUCTS}), 200


# RES 3 (PROVIDER)
#     GET /providers                         - поставщики
@APP.route('/providers', methods=['GET'])
def providers():
    """
    # RES 3 (PROVIDER)
    #     GET /providers                         - поставщики
    """
    return jsonify({'providers': PROVIDERS}), 200


#     GET /providers/<string:provider_name>  - поставщик
@APP.route('/providers/<string:provider_name>', methods=['GET'])
def provider(provider_name):
    """
    #     GET /providers/<string:provider_name>  - поставщик
    """
    return jsonify({'provider': PROVIDERS[provider_name]}), 200


#     GET /providers/sequences/sends_all               - поставщики, которые поставляют всё
@APP.route('/providers/sequences/sends_all', methods=['GET'])
def providers_sends_all():
    """
    #     GET /providers/sequences/sends_all               - поставщики, которые поставляют всё
    """
    return jsonify({'provider': PROVIDERS}), 200


#     GET /providers/sequences/mouse_kovr              - поставщик, который продает дешевле
@APP.route('/providers/sequences/mouse_kovr', methods=['GET'])
def providers_mouse_kovr():
    """
    #     GET /providers/sequences/mouse_kovr              - поставщик, который продает дешевле
    """
    return jsonify({'provider': PROVIDERS}), 200


APP.run(port=8080, debug=True)
