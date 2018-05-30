# Адресные подсказки [DaData.ru](https://dadata.ru/) для HikaShop

## Русский.

Плагин для добавления адресных подсказок сервиса [DaData.ru](https://dadata.ru/) в адресные поля HikaShop (в личном кабинете и на странице оформления заказа).

Как использовать плагин:

1. Среди полей адреса в HikaShop необходимо оставить только три: **address_state** (используется в ограничениях плагинов оплаты и доставки HikaShop), **address_street** (здесь будут подсказки) и **address_post_code** (используется в ограничениях плагинов оплаты и доставки HikaShop). Оставшиеся поля: **address_country**, **address_city** необходимо отключить. Город, улица, дом и квартира (если есть) будут вводиться только в поле **address_street** и в нем будут храниться. После ввода адреса, индекс будет подставляться в поле **address_post_code**.

>**Примечание**. Для удобства восприятия вы можете переименовать поле Улица в Адрес.

>**Примечание**. Расположите поле ввода индекса **после** поля ввода адреса, чтобы посетитель вначале вводил адрес.

>**Примечание**. Вы можете использовать любые другие поля для ввода и хранения адреса и подстановки индекса. Для этого, в настройках плагина необходимо указать ID полей, которые вы хотите использовать.

2. Зарегистрируйтесь в сервисе [DaData.ru](https://dadata.ru/), обязательно подтвердите свой email и получите токен в [личном кабинете](https://dadata.ru/profile/#info).

3. Установите плагин обычным способом.

4. В настройках плагина укажите необходимые параметры: ID поля для ввода адреса (по умолчанию **address_street**), ID поля для подстановки индекса (по умолчанию **address_post_code**) и API-ключ (токен) сервиса [DaData.ru](https://dadata.ru/).

5. Активируйте плагин.

6. Готово! Адресные подсказки появятся в поле, которое вы выбрали для ввода адреса, а индекс будет автоматически подставляться в поле для подстановки индекса.

## English.

Plugin for adding [DaData.ru](https://dadata.ru/) service address suggestions to the HikaShop address fields (in the customer area and at the checkout).

How to use the plugin:

1. Among the address fields in HikaShop, you need to leave only three: **address_state** (used in the restrictions of HikaShop payment and delivery plugins), **address_street** (there will be suggestions) and **address_post_code** (used in the restrictions of HikaShop payment and delivery plugins). The remaining fields: **address_country**, **address_city** must be disabled. The city, street, house and apartment (if any) will be entered only into **address_street** field and stored there. After entering the address the post code will be substituted in the **address_post_code** field.

>**Note**. For convenience of perception, you can rename the Street to Address field.

>**Note**. Place the post code field **after** the address field so that the visitor first enters the address.

>**Note**. You can use any other fields for entering and storing the address and for the post code substitution. For that you must specify the IDs of the fields that you want to use in the plugin's settings.

2. Register in the [DaData.ru](https://dadata.ru/) service, be sure to confirm your email and get a token in [personal area](https://dadata.ru/profile/#info).

3. Install the plugin in the usual way.

4. In the plugin settings, specify the required parameters: field ID for entering the address (by default **address_street**), field ID for the post code substitution (by default **address_post_code**) and [DaData.ru](https://dadata.ru/) service API key (token).

5. Activate the plugin.

6. Done! Address suggestions will appear in the field that you have chosen for entering the address, and the post code will be automatically substituted in the field for the post code substitution.