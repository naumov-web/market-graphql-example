<!DOCTYPE html>
<html>
    <head>
        <title>
            Примеры запросов GraphQL
        </title>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="/css/docs-page.css" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">
                        Примеры запросов GraphQL
                    </h1>
                    <div class="example">
                        <h2 class="text-center">Авторизация</h2>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Наименование параметра запроса</th>
                                    <th>Значение параметра запроса</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Путь к схеме</td>
                                    <td>/graphql</td>
                                </tr>
                                <tr>
                                    <td>Метод</td>
                                    <td>POST</td>
                                </tr>
                                <tr>
                                    <td>Заголовок Content-Type</td>
                                    <td>application/json</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="text-center">
                            {"query":"{ login (email:\"test@test.com\", password:\"qweasd\"){token}}"}
                        </p>
                    </div>
                    <div class="example">
                        <h2 class="text-center">Категории товаров</h2>

                        <h4 class="text-center">Добавление категории</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Наименование параметра запроса</th>
                                    <th>Значение параметра запроса</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Путь к схеме</td>
                                    <td>/graphql/categories</td>
                                </tr>
                                <tr>
                                    <td>Метод</td>
                                    <td>POST</td>
                                </tr>
                                <tr>
                                    <td>Заголовок Content-Type</td>
                                    <td>application/json</td>
                                </tr>
                                <tr>
                                    <td>Заголовок Authorization</td>
                                    <td>Bearer &lt;токен&gt;</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="text-center">
                            {"query":"mutation { create (name:\"Категория\", parent_id: 3){name, id, parent_id}}"}
                        </p>

                        <h4 class="text-center">Список категорий</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Наименование параметра запроса</th>
                                    <th>Значение параметра запроса</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Путь к схеме</td>
                                    <td>/graphql/categories</td>
                                </tr>
                                <tr>
                                    <td>Метод</td>
                                    <td>GET</td>
                                </tr>
                                <tr>
                                    <td>Query-параметр limit</td>
                                    <td>Количество элементов в выборке</td>
                                </tr>
                                <tr>
                                    <td>Query-параметр offset</td>
                                    <td>Сдвиг элементов в выборке</td>
                                </tr>
                                <tr>
                                    <td>Query-параметр sort_by</td>
                                    <td>Поле, по которому будет производится сортировка</td>
                                </tr>
                                <tr>
                                    <td>Query-параметр sort_direction</td>
                                    <td>Направление сортировки</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="text-center">
                            /graphql/categories?query={ list (limit: 2, offset: 0, sort_by: "id", sort_direction: "desc"){count, items {id, name, parent_id}}}
                        </p>

                        <h4 class="text-center">Обновление категории</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Наименование параметра запроса</th>
                                    <th>Значение параметра запроса</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Путь к схеме</td>
                                    <td>/graphql/categories</td>
                                </tr>
                                <tr>
                                    <td>Метод</td>
                                    <td>PUT</td>
                                </tr>
                                <tr>
                                    <td>Заголовок Content-Type</td>
                                    <td>application/json</td>
                                </tr>
                                <tr>
                                    <td>Заголовок Authorization</td>
                                    <td>Bearer &lt;токен&gt;</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="text-center">
                            {"query":"mutation { update (id:7, name:\"Новая категория\", parent_id: 4){name, id, parent_id}}"}
                        </p>

                        <h4 class="text-center">Удаление категории</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Наименование параметра запроса</th>
                                    <th>Значение параметра запроса</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Путь к схеме</td>
                                    <td>/graphql/categories</td>
                                </tr>
                                <tr>
                                    <td>Метод</td>
                                    <td>DELETE</td>
                                </tr>
                                <tr>
                                    <td>Заголовок Content-Type</td>
                                    <td>application/json</td>
                                </tr>
                                <tr>
                                    <td>Заголовок Authorization</td>
                                    <td>Bearer &lt;токен&gt;</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="text-center">
                            {"query":"mutation { delete (id:6){success}}"}
                        </p>
                    </div>
                    <div class="example">
                        <h2 class="text-center">Бренды</h2>

                        <h4 class="text-center">Добавление бренда</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Наименование параметра запроса</th>
                                    <th>Значение параметра запроса</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Путь к схеме</td>
                                    <td>/graphql/brands</td>
                                </tr>
                                <tr>
                                    <td>Метод</td>
                                    <td>POST</td>
                                </tr>
                                <tr>
                                    <td>Заголовок Content-Type</td>
                                    <td>application/json</td>
                                </tr>
                                <tr>
                                    <td>Заголовок Authorization</td>
                                    <td>Bearer &lt;токен&gt;</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="text-center">
                            {"query":"mutation { create (name:\"HP\"){name, id}}"}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
