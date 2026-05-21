import React from 'react';
import { BrowserRouter as Router, Routes, Route, Link } from 'react-router-dom';
import TableUsers from './TableUser';
import FormUsers from './FormUser';
import EditUser from './EditUser';
import MascotaJuntalia from "./MascotaJuntalia";  
import Ini from './Ini';
import './styles.css'; // ✅ Importamos los estilos

export default function App() {
    return (
        <Router>
            <div className="app-container">
                {/*NAVBAR */}
                <nav className="navbar navbar-expand-lg navbar-custom">
                    <div className="container">
                        <div className="collapse navbar-collapse justify-content-center" id="navbarNav">
                            <ul className="navbar-nav">
                                <li className="nav-item">
                                    <Link className="nav-link" to="/">Inicio</Link>
                                </li>
                                <li className="nav-item">
                                    <Link className="nav-link" to="/UserTable">Tabla de Usuarios</Link>
                                </li>
                                <li className="nav-item">
                                    <Link className="nav-link" to="/FormUser">Formulario de Usuarios</Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div>
                <h1>Panel de Administración</h1>
                <MascotaJuntalia />
                </div>

                {/* Div Principal */}
                <div className="content-container">
                    <Routes>
                        <Route path="/" element={<Ini />} />
                        <Route path="/FormUser" element={<FormUsers />} />
                        <Route path="/UserTable" element={<TableUsers />} />
                        <Route path="/editUser/:id" element={<EditUser />} />
                    </Routes>
                </div>
            </div>
        </Router>
    );
}







/*antes de los estilos
import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import './styles.css';
import { BrowserRouter as Router, Routes, Route, Link } from 'react-router-dom';
import TableUsers from './TableUser';
import FormUsers from './FormUser';
import EditUser from './EditUser';
import Home from './Ini'; 

export default function App() {
    return (
        <Router>
            <div className="container">
                <nav>
                    <ul className="nav">
                        <li className="nav-item">
                            <Link className="nav-link" to="/">Inicio</Link>
                        </li>
                    </ul>
                </nav>

                <Routes>
                    <Route path="/" element={<Home />} /> 
                    <Route path="/FormUser" element={<FormUsers />} />
                    <Route path="/UserTable" element={<TableUsers />} />
                    <Route path="/editUser/:id" element={<EditUser />} />
                </Routes>
            </div>
        </Router>
    );
}
*/