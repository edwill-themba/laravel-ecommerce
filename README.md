#This is simple ecommerce site that can sell simple products such as protein powders or electroncs etc.
#How the applications is structured the application has 5 controllers
1.AuthController is responsible for creating,loging,loging out and update users details.
  The query field under users is  for in case a user forgot his or her password he/she will type his email and query if matched he will be able to change his password,by default all users are added as subscribers if you want to add an admin register use and update user_type to "admin" under table users,then the admin user will have powers to add new products update and delete products.
2.ProductController manage products
3.CartController is for adding ,removing items on the cart,we are using hardevin shopping cart
4.CheckoutController is responsible for user payment
5.Thank you controller is for thanks the when payment went well and email is sent to the user.
# For payment options
we are using stripe you need to put STRIPE_KEY= and STRIPE_SECRET = on .env file and on stripe secret on the payment charge
