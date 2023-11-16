
/*
Filename : lib/DokterCombo.js
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
function populateDokter() {
    let fetchUrl = '../lib/dokterCombo.php';

    fetch(fetchUrl)
        .then(response => response.json())
        .then(data => {
            const select = document.getElementById('dokter_id');

            // Clear existing options
            select.innerHTML = '';

            // Loop through the data and create options
            data.forEach(item => {
                const option = document.createElement('option');
                option.value = item.id; // You can set the value to the dokter ID
                option.textContent = `${item.nama}`;
                select.appendChild(option);
            });

            // After populating the combo box, you can call fetchData if needed
            fetchData();
        })
        .catch(error => console.error('Error:', error));
}

function fetchDataDokter() {
    // Assuming you have obtained the 'id' from the browser
    var dokter = document.getElementById('dokter');
    var id = dokter.dataset.id;
    

    if (id !== null) {
        let fetchUrl = '../lib/dokterCombo.php?id='+id;

        fetch(fetchUrl)
            .then(response => response.json())
            .then(data => {
                const select = document.getElementById('dokter_id');

                // Set the selected option based on the provided ID
                select.value = id;
            })
            .catch(error => console.error('Error:', error));
    }
}

populateDokter();
fetchDataDokter();