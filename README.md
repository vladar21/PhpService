# PhpService

PhpService - это бекенд сервис на языке PHP 7, который связывает три API: SalesAPI, BillAPI и CustomAPI, и предоставляет свой собственный API (PhpServiceAPI) для информирования пользователя о текущем состоянии заказа и перенаправления сообщений об ошибках.

## Описание API

- SalesAPI возвращает данные о проданном товаре в формате JSON. Пример ответа:

```json
{
  "order_id": "123456",
  "product_id": "ABC123",
  "product_name": "Ноутбук",
  "product_price": "50000",
  "quantity": "1",
  "customer_id": "7890",
  "customer_name": "Иван Иванов",
  "customer_email": "ivan@example.com",
  "customer_phone": "+7 (999) 999-99-99"
}
```

- BillAPI получает данные о проданных товарах от SalesAPI, затем подготавливает набор данных для счета-фактуры и отправляет этот набор данных в CustomAPI. Пример набора данных для счета-фактуры:

```json
{
  "invoice_id": "INV-123456",
  "order_id": "123456",
  "seller_id": "XYZ789",
  "seller_name": "ООО \"Продавец\"",
  ...
}
```

- CustomAPI получает данные для счета-фактуры от BillAPI и возвращает true или сообщение об ошибке в формате JSON. Примеры ответов:

```json
{
 success: true
}
```

```json
{
 success: false,
 error: {
   code: -1,
   message: 'Неверный формат данных'
 }
}
```

- PhpServiceAPI предоставляет следующие методы для взаимодействия с пользователем:

| Метод | Описание | Параметры | Ответ |
| --- | --- | --- | --- |
| GET /status | Возвращает текущий статус заказа по его идентификатору | order_id - идентификатор заказа | JSON-объект с полями: status - статус заказа (например, 'обрабатывается', 'сформирован', 'отправлен', 'ошибка'), message - дополнительное сообщение (например, сообщение об ошибке от CustomAPI) |
| POST /notify | Отправляет уведомление пользователю по электронной почте или телефону о статусе заказа | order_id - идентификатор заказа, notify_type - тип уведомления ('email' или 'sms') | JSON-объект с полем: success - true или false в зависимости от результата отправки уведомления |

## Функциональные требования

- PhpService должен быть реализован на языке PHP 7 с использованием стиля ООП в программировании на PHP.
- PhpService должен использовать фреймворк CodeIgniter 4 для создания веб-приложения и RESTful API.
- PhpService должен поддерживать аутентификацию и авторизацию пользователей с помощью JWT (JSON Web Token).
- PhpService должен регулярно опрашивать SalesAPI для получения данных о новых заказах и сохранять их в локальной базе данных MySQL.
- PhpService должен передавать данные о новых заказах в BillAPI для формирования счета-фактуры и получать от него данные для счета-фактуры.
- PhpService должен передавать данные для счета-фактуры в CustomAPI и получать от него ответ об успешности или ошибке.
- PhpService должен обновлять статус заказа в локальной базе данных в зависимости от ответа от CustomAPI.
- PhpService должен предоставлять метод GET /status для получения текущего статуса заказа по его идентификатору.
- PhpService должен предоставлять метод POST /notify для отправки уведомления пользователю по электронной почте или телефону о статусе заказа. Для отправки уведомлений PhpService должен использовать сервисы Mailgun и Twilio соответственно.
- PhpService должен логировать все запросы и ответы от API, а также ошибки и исключения в файлы журнала.

## Диаграмма классов

![PhpService Class Diagram](PhpService_Class_Diagram.png)

На диаграмме показаны основные классы, используемые в PhpService, их атрибуты и методы, а также связи между ними. Краткое описание каждого класса:

- **Controller** - абстрактный класс, который определяет общую логику для всех контроллеров в PhpService. Он наследует от базового класса CodeIgniter\Controller и содержит методы для проверки аутентификации и авторизации пользователя, а также для отправки ответов в формате JSON.
- **UserController** - класс, который отвечает за обработку запросов, связанных с пользователями. Он наследует от класса Controller и содержит методы для регистрации, входа и выхода пользователя, а также для получения и обновления профиля пользователя.
- **OrderController** - класс, который отвечает за обработку запросов, связанных с заказами. Он наследует от класса Controller и содержит методы для получения списка заказов пользователя, получения деталей заказа по его идентификатору, и запроса уведомления о статусе заказа по электронной почте или телефону.
- **Model** - абстрактный класс, который определяет общую логику для всех моделей в PhpService. Он наследует от базового класса CodeIgniter\Model и содержит методы для работы с базой данных MySQL с помощью библиотеки Query Builder.
- **UserModel** - класс, который отвечает за работу с данными о пользователях. Он наследует от класса Model и содержит методы для создания, поиска, проверки и обновления пользователей в базе данных.
- **OrderModel** - класс, который отвечает за работу с данными о заказах. Он наследует от класса Model и содержит методы для создания, поиска, обновления и удаления заказов в базе данных.
- **SalesAPI** - класс, который отвечает за взаимодействие с SalesAPI. Он содержит методы для отправки GET запросов к SalesAPI и получения данных о проданных товарах в формате JSON.
- **BillAPI** - класс, который отвечает за взаимодействие с BillAPI. Он содержит методы для отправки POST запросов к BillAPI с данными о проданных товарах и получения данных для счета-фактуры в формате JSON.
- **CustomAPI** - класс, который отвечает за взаимодействие с CustomAPI. Он содержит методы для отправки POST запросов к CustomAPI с данными для счета-фактуры и получения ответа об успешности или ошибке в формате JSON.
- **Mailgun** - класс, который отвечает за отправку уведомлений по электронной почте с помощью сервиса Mailgun. Он содержит методы для формирования и отправки сообщений по заданным параметрам: адресат, тема, текст и т.д.
- **Twilio** - класс, который отвечает за отправку уведомлений по телефону с помощью сервиса Twilio. Он содержит методы для формирования и отправки сообщений по заданным параметрам: номер телефона, текст и т.д.
