let cart = [];

// Called when user clicks "Add to Cart"
function addToCart(itemName, price) {
    let existingItem = cart.find(item => item.name === itemName);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            name: itemName,
            price: price,
            quantity: 1
        });
    }

    updateCartTable();
}

// Update cart table and total
function updateCartTable() {
    const cartBody = document.getElementById("cartBody");
    cartBody.innerHTML = "";

    let totalAmount = 0;

    cart.forEach((item, index) => {
        let row = document.createElement("tr");

        let itemTotal = item.price * item.quantity;
        totalAmount += itemTotal;

        row.innerHTML = `
            <td>${index + 1}</td>
            <td>${item.name}</td>
            <td>
                <input type="number" min="1" value="${item.quantity}"
                onchange="changeQuantity(${index}, this.value)">
            </td>
            <td>₹${itemTotal}</td>
        `;

        cartBody.appendChild(row);
    });

    document.getElementById("totalAmount").innerText = "₹" + totalAmount;
}

// When quantity is changed manually
function changeQuantity(index, newQty) {
    cart[index].quantity = Number(newQty);
    updateCartTable();
}
function checkout() {
    if(cart.length === 0) {
        alert("Your cart is empty!");
        return;
    }
    confirm("Proceeding to checkout. Thank you for your order!");
    cart = [];
    updateCartTable();
};