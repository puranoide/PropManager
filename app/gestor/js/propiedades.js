const userid = document.getElementById("userId").textContent;

function getinmobiliariaporiduser(userid) {
    fetch("../../controller/propiedades.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ "action": "selectinmobiliariabyuser", "iduser": userid }),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log("respuesta exitosa,sesion creada");
            console.log("respuesta :", data);
            if (data.success) {
                //console.log("inmobiliaria encontrada");
                //console.log("inmobiliaria encontrada:", data.propiedades);
                inmobiliaria = data.propiedades;
                setearPropiedades(inmobiliaria);
            } else {
                console.log("inmobiliaria no encontrada");
            }
        })
        .catch((error) => {
            console.log(error);
        });
}


function setearPropiedades(data) {
    var tbodypropiedades = document.getElementById("tbody-propiedades");
    tbodypropiedades.innerHTML = "";
    for (let index = 0; index < data.length; index++) {
        const element = data[index];
        //creacion de elementos
        let tr = document.createElement("tr");
        let tdnombre = document.createElement("td");
        let tddireccion = document.createElement("td");
        let tdfecharegistro = document.createElement("td");
        let tdestado = document.createElement("td");
         //creacion de las clases-css
        tr.classList.add("bg-card-dark");
        tr.classList.add("border-b");
        tr.classList.add("border-gray-600");

        tdnombre.classList.add("px-6");
        tdnombre.classList.add("py-4");
        tddireccion.classList.add("px-6");
        tddireccion.classList.add("py-4");
        tdfecharegistro.classList.add("px-6");
        tdfecharegistro.classList.add("py-4");
        tdestado.classList.add("px-6");
        tdestado.classList.add("py-4");

        tdnombre.textContent = element.nombrePropiedad;
        tddireccion.textContent = element.direccionPropiedad;
        tdfecharegistro.textContent = element.fechaRegistroPropiedad;
        tdestado.textContent = element.estadopropiedadfk ===1?"Activo":"Inactivo";

        tr.appendChild(tdnombre);
        tr.appendChild(tddireccion);
        tr.appendChild(tdfecharegistro);
        tr.appendChild(tdestado);
        tbodypropiedades.appendChild(tr);
    }
}




console.log(userid);
    getinmobiliariaporiduser(userid);