const btnMulai = document.querySelector(".hero .btn-primary");

btnMulai.addEventListener("click", function () {
    
    const popup = document.createElement("div");

    popup.innerHTML = `
        <div style="
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        ">
            <div style="
                background: white;
                padding: 25px;
                border-radius: 10px;
                text-align: center;
                width: 320px;
            ">
                <h2>Fitur Belum Tersedia</h2>
                <p>Fitur Analisis Skill sedang dalam tahap pengembangan.</p>
                <button id="closePopup" style="
                    margin-top: 15px;
                    padding: 8px 15px;
                    border: none;
                    background: #3498db;
                    color: white;
                    border-radius: 5px;
                    cursor: pointer;
                ">Tutup</button>
            </div>
        </div>
    `;

    document.body.appendChild(popup);

    document.getElementById("closePopup").addEventListener("click", function () {
        popup.remove();
    });

});
