<?php

Breadcrumbs::for("home", function ($trail) {
    $trail->push("Início", route("home"));
});

Breadcrumbs::for("users.index", function ($trail) {
    $trail->parent("home");
    $trail->push("Usuários", route("users.index"));
});
Breadcrumbs::for("users.create", function ($trail) {
    $trail->parent("users.index");
    $trail->push("Adicionar", route("users.create"));
});
Breadcrumbs::for("users.show", function ($trail, $user) {
    $trail->parent("users.index");
    $trail->push($user->name, route("users.show", [$user->id]));
});
Breadcrumbs::for("users.edit", function ($trail, $user) {
    $trail->parent("users.show", $user);
    $trail->push("Editar", route("users.edit", [$user->id]));
});

Breadcrumbs::for("stores.index", function ($trail) {
    $trail->parent("home");
    $trail->push("Lojas", route("stores.index"));
});
Breadcrumbs::for("stores.create", function ($trail) {
    $trail->parent("stores.index");
    $trail->push("Adicionar", route("stores.create"));
});
Breadcrumbs::for("stores.show", function ($trail, $store) {
    $trail->parent("stores.index");
    $trail->push($store->name, route("stores.show", [$store->id]));
});
Breadcrumbs::for("stores.edit", function ($trail, $store) {
    $trail->parent("stores.show", $store);
    $trail->push("Editar", route("stores.edit", [$store->id]));
});

Breadcrumbs::for("products.index", function ($trail) {
    $trail->parent("home");
    $trail->push("Produtos", route("products.index"));
});
Breadcrumbs::for("products.create", function ($trail) {
    $trail->parent("products.index");
    $trail->push("Adicionar", route("products.create"));
});
Breadcrumbs::for("products.show", function ($trail, $product) {
    $trail->parent("products.index");
    $trail->push($product->name, route("products.show", [$product->id]));
});
Breadcrumbs::for("products.edit", function ($trail, $product) {
    $trail->parent("products.show", $product);
    $trail->push("Editar", route("products.edit", [$product->id]));
});

Breadcrumbs::for("productInfos.index", function ($trail) {
    $trail->parent("home");
    $trail->push("Informações do produto", route("productInfos.index"));
});
Breadcrumbs::for("productInfos.create", function ($trail) {
    $trail->parent("productInfos.index");
    $trail->push("Adicionar", route("productInfos.create"));
});
Breadcrumbs::for("productInfos.show", function ($trail, $productInfo) {
    $trail->parent("productInfos.index");
    $trail->push($productInfo->model, route("productInfos.show", [$productInfo->id]));
});
Breadcrumbs::for("productInfos.edit", function ($trail, $productInfo) {
    $trail->parent("productInfos.show", $productInfo);
    $trail->push("Editar", route("productInfos.edit", [$productInfo->id]));
});

Breadcrumbs::for("deliveryInfos.index", function ($trail) {
    $trail->parent("home");
    $trail->push("Informações de entrega", route("deliveryInfos.index"));
});
Breadcrumbs::for("deliveryInfos.create", function ($trail) {
    $trail->parent("deliveryInfos.index");
    $trail->push("Adicionar", route("deliveryInfos.create"));
});
Breadcrumbs::for("deliveryInfos.show", function ($trail, $deliveryInfo) {
    $trail->parent("deliveryInfos.index");
    $trail->push($deliveryInfo->recipient_name, route("deliveryInfos.show", [$deliveryInfo->id]));
});
Breadcrumbs::for("deliveryInfos.edit", function ($trail, $deliveryInfo) {
    $trail->parent("deliveryInfos.show", $deliveryInfo);
    $trail->push("Editar", route("deliveryInfos.edit", [$deliveryInfo->id]));
});

Breadcrumbs::for("orders.index", function ($trail) {
    $trail->parent("home");
    $trail->push("Pedidos", route("orders.index"));
});
Breadcrumbs::for("orders.create", function ($trail) {
    $trail->parent("orders.index");
    $trail->push("Adicionar", route("orders.create"));
});
Breadcrumbs::for("orders.show", function ($trail, $order) {
    $trail->parent("orders.index");
    $trail->push($order->order_date, route("orders.show", [$order->id]));
});
Breadcrumbs::for("orders.edit", function ($trail, $order) {
    $trail->parent("orders.show", $order);
    $trail->push("Editar", route("orders.edit", [$order->id]));
});

Breadcrumbs::for("orderProducts.index", function ($trail) {
    $trail->parent("home");
    $trail->push("Produtos do pedido", route("orderProducts.index"));
});
Breadcrumbs::for("orderProducts.create", function ($trail) {
    $trail->parent("orderProducts.index");
    $trail->push("Adicionar", route("orderProducts.create"));
});
Breadcrumbs::for("orderProducts.show", function ($trail, $orderProduct) {
    $trail->parent("orderProducts.index");
    $trail->push($orderProduct->id, route("orderProducts.show", [$orderProduct->id]));
});
Breadcrumbs::for("orderProducts.edit", function ($trail, $orderProduct) {
    $trail->parent("orderProducts.show", $orderProduct);
    $trail->push("Editar", route("orderProducts.edit", [$orderProduct->id]));
});

Breadcrumbs::for("ratings.index", function ($trail) {
    $trail->parent("home");
    $trail->push("Avaliações", route("ratings.index"));
});
Breadcrumbs::for("ratings.create", function ($trail) {
    $trail->parent("ratings.index");
    $trail->push("Adicionar", route("ratings.create"));
});
Breadcrumbs::for("ratings.show", function ($trail, $rating) {
    $trail->parent("ratings.index");
    $trail->push($rating->description, route("ratings.show", [$rating->id]));
});
Breadcrumbs::for("ratings.edit", function ($trail, $rating) {
    $trail->parent("ratings.show", $rating);
    $trail->push("Editar", route("ratings.edit", [$rating->id]));
});

Breadcrumbs::for("payments.index", function ($trail) {
    $trail->parent("home");
    $trail->push("Produtos do pedido", route("payments.index"));
});
Breadcrumbs::for("payments.create", function ($trail) {
    $trail->parent("payments.index");
    $trail->push("Adicionar", route("payments.create"));
});
Breadcrumbs::for("payments.show", function ($trail, $payment) {
    $trail->parent("payments.index");
    $trail->push($payment->payment_date, route("payments.show", [$payment->id]));
});

Breadcrumbs::for("buyerTransfers.index", function ($trail) {
    $trail->parent("home");
    $trail->push("Produtos do pedido", route("buyerTransfers.index"));
});
Breadcrumbs::for("buyerTransfers.create", function ($trail) {
    $trail->parent("buyerTransfers.index");
    $trail->push("Adicionar", route("buyerTransfers.create"));
});
Breadcrumbs::for("buyerTransfers.show", function ($trail, $buyerTransfer) {
    $trail->parent("buyerTransfers.index");
    $trail->push($buyerTransfer->transfer_date, route("buyerTransfers.show", [$buyerTransfer->id]));
});
Breadcrumbs::for("buyerTransfers.edit", function ($trail, $buyerTransfer) {
    $trail->parent("buyerTransfers.show", $buyerTransfer);
    $trail->push("Editar", route("buyerTransfers.edit", [$buyerTransfer->id]));
});