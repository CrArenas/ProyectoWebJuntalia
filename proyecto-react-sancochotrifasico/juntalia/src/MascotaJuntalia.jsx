import React from "react";
import "./styles.css";
import mascotaImagen from "./assets/images/Mascota-Feliz.jpeg";

const MascotaJuntalia = () => {
  return (
    <div className="mascota-container">
      <img src={mascotaImagen} alt="Mascota" className="mascota-imagen"/>
      <div className="burbuja-texto">
        <span style={{ fontWeight: "bold" }}>Junior: </span>
        <p></p>
        ¡Hola administrador! Este es el panel que utilizamos para llevar a cabo el team de React. 😼​
        Acá podrás consultar, añadir, modificar y eliminar usuarios. Ten cuidado con manipular esta información
        para fines maliciosos. 👻​ No nos hacemos responsables de cambios que se hagan a los usuarios durante 
        la sustentación. 😡​😡​😡​
        
      </div>
    </div>
  );
};

export default MascotaJuntalia;
