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
from flask import Flask, jsonify, request

app = Flask(__name__)

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
@app.route('/', methods=['GET'])
def homepage():
    return """<h1>Hello darkness my old friend</h1>"""


# RES 2 (STORE)
#     GET /store                             - список товаров (магазин)
@app.route('/store', methods=['GET'])
def store_get():
    return jsonify({'products': PRODUCTS}), 200


#     GET /store/<string:product_name>       - товар
@app.route('/store/<string:product_name>', methods=['GET'])
def product(product_name):
    return jsonify({'product_name': PRODUCTS[product_name]}), 200


#     GET /store/sequences/price_not_changed           - товары, цены которых не менялись
@app.route('/store/sequences/price_not_changed', methods=['GET'])
def product_price_not_changed():
    return jsonify({'products': PRODUCTS}), 200


#     GET /store/sequences/instrument                  - цена его
@app.route('/store/sequences/instrument', methods=['GET'])
def product_instrument():
    return jsonify({'product_name': PRODUCTS}), 200


# RES 3 (PROVIDER)
#     GET /providers                         - поставщики
@app.route('/providers', methods=['GET'])
def providers():
    return jsonify({'providers': PROVIDERS}), 200


#     GET /providers/<string:provider_name>  - поставщик
@app.route('/providers/<string:provider_name>', methods=['GET'])
def provider(provider_name):
    return jsonify({'provider': PROVIDERS[provider_name]}), 200


#     GET /providers/sequences/sends_all               - поставщики, которые поставляют всё
@app.route('/providers/sequences/sends_all', methods=['GET'])
def providers_sends_all():
    return jsonify({'provider': PROVIDERS}), 200


#     GET /providers/sequences/mouse_kovr              - поставщик, который продает дешевле
@app.route('/providers/sequences/mouse_kovr', methods=['GET'])
def providers_mouse_kovr():
    return jsonify({'provider': PROVIDERS}), 200


app.run(port=8080, debug=True)
