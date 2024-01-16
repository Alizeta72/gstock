
    const select = document.querySelector('select[name="article"]');
    const quantite = document.querySelector("#quantite")
    let prix

    select.addEventListener("change",() =>{
        const selectOption = select.selectedOptions[0];
        prix = selectOption.getAttribute("prix")

    })

    quantite.addEventListener('input',(e)=>{
        const currentValue = e.target.value
        let totalPrice = prix * currentValue;

        document.querySelector('#price').value = totalPrice;

    })