import React from "react";
import { Link } from "react-router-dom";
import "bootstrap/dist/css/bootstrap.min.css";

function Home() {
  return (
    <div className="container text-center mt-5">
      <h3>Gestión de Usuarios</h3>
      <p className="lead">Selecciona una opción:</p>
      <div className="d-flex justify-content-center gap-3">
        <Link to="/UserTable" className="btn btn-primary btn-lg">
          Ver Usuarios
        </Link>
        <Link to="/FormUser" className="btn btn-success btn-lg">
          Crear Usuario
        </Link>
      </div>
    </div>
  );
}

export default Home;
