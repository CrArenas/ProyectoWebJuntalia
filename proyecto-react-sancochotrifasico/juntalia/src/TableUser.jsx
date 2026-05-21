import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';

function TableUsers() {
  const [users, setUsers] = useState([]); 
  const [search, setSearch] = useState('');
  const [currentPage, setCurrentPage] = useState(1);
  const [isLoaded, setIsLoaded] = useState(false);
  const usersPerPage = 5;

  function fetchUsers() {
    fetch('http://127.0.0.1:8000/api/users')
      .then(res => res.json())
      .then(data => {
        setUsers(data.data);
        setIsLoaded(true);
      })
      .catch(err => console.log('Error:', err));
  }

  function deleteUser(id) {
    if (!window.confirm('¿Estás seguro de que deseas eliminar este usuario?')) return;

    fetch(`http://127.0.0.1:8000/api/users/${id}`, {
      method: 'DELETE',
    })
      .then(res => res.json())
      .then(() => {
        setUsers(prevUsers => prevUsers.filter(user => user.id !== id));
        if ((currentPage - 1) * usersPerPage >= users.length - 1) {
          setCurrentPage(prev => Math.max(prev - 1, 1));
        }
      })
      .catch(err => console.log('Error:', err));
  }

  function addUser(newUser) {
    setUsers(prevUsers => [...prevUsers, newUser]);
    const totalPages = Math.ceil((users.length + 1) / usersPerPage);
    setCurrentPage(totalPages);
  }

  const filteredUsers = users.filter(user =>
    user.email.toLowerCase().includes(search.toLowerCase())
  );

  const indexOfLastUser = currentPage * usersPerPage;
  const indexOfFirstUser = indexOfLastUser - usersPerPage;
  const currentUsers = filteredUsers.slice(indexOfFirstUser, indexOfLastUser);

  return (
    <div className="container mt-4 table-container">
      <h2 className="mb-3 text-center">Lista de Usuarios</h2>
      
      <button className="btn btn-primary mb-3 w-100" onClick={fetchUsers}>
        Obtener Usuarios
      </button>

      {!isLoaded ? (
        <p className="text-center">Presiona el botón para cargar los usuarios.</p>
      ) : (
        <>
          <input
            type="text"
            placeholder="Buscar por correo"
            className="form-control mb-3"
            value={search}
            onChange={(e) => setSearch(e.target.value)}
          />
          <div className="table-responsive">
            <table className="table table-bordered table-striped">
              <thead className="table-dark">
                <tr>
                  <th>ID</th>
                  <th>Rol</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Email</th>
                  <th>Teléfono</th>
                  <th>Fecha de Nacimiento</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                {currentUsers.length > 0 ? (
                  currentUsers.map(user => (
                    <tr key={user.id}>
                      <td>{user.id}</td>
                      <td>{user.rol_id}</td>
                      <td>{user.name}</td>
                      <td>{user.last_name}</td>
                      <td>{user.email}</td>
                      <td>{user.phone}</td>
                      <td>{user.birth_date}</td>
                      <td>
                        <Link to={`/editUser/${user.id}`} className="btn btn-warning me-2 btn-sm">Editar</Link>
                        <button className="btn btn-danger btn-sm" onClick={() => deleteUser(user.id)}>Eliminar</button>
                      </td>
                    </tr>
                  ))
                ) : (
                  <tr>
                    <td colSpan="8" className="text-center">No hay usuarios disponibles.</td>
                  </tr>
                )}
              </tbody>
            </table>
          </div>

          <div className="d-flex justify-content-center">
            <button className="btn btn-secondary me-2" onClick={() => setCurrentPage(prev => Math.max(prev - 1, 1))} disabled={currentPage === 1}>
              Anterior
            </button>
            <span>Página {currentPage}</span>
            <button className="btn btn-secondary ms-2" onClick={() => setCurrentPage(prev => (indexOfLastUser < filteredUsers.length ? prev + 1 : prev))} disabled={indexOfLastUser >= filteredUsers.length}>
              Siguiente
            </button>
          </div>
        </>
        
      )}
    </div>
  );
}

export default TableUsers;






/*Antes de los estilos
import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';

function TableUsers() {
  const [users, setUsers] = useState([]); 
  const [search, setSearch] = useState('');
  const [currentPage, setCurrentPage] = useState(1);
  const [isLoaded, setIsLoaded] = useState(false); // Controla si se han cargado los usuarios
  const usersPerPage = 5;

  function fetchUsers() {
    fetch('http://127.0.0.1:8000/api/users')
      .then(res => res.json())
      .then(data => {
        setUsers(data.data);
        setIsLoaded(true); // Marcar que los usuarios ya están cargados
      })
      .catch(err => console.log('Error:', err));
  }

  function deleteUser(id) {
    if (!window.confirm('¿Estás seguro de que deseas eliminar este usuario?')) return;

    fetch(`http://127.0.0.1:8000/api/users/${id}`, {
      method: 'DELETE',
    })
      .then(res => res.json())
      .then(() => {
        setUsers(prevUsers => prevUsers.filter(user => user.id !== id));

        // Si eliminamos el último usuario de la página, retroceder de página
        if ((currentPage - 1) * usersPerPage >= users.length - 1) {
          setCurrentPage(prev => Math.max(prev - 1, 1));
        }
      })
      .catch(err => console.log('Error:', err));
  }

  function addUser(newUser) {
    setUsers(prevUsers => [...prevUsers, newUser]);

    // Si el usuario nuevo no cabe en la página actual, ir a la última página
    const totalPages = Math.ceil((users.length + 1) / usersPerPage);
    setCurrentPage(totalPages);
  }

  const filteredUsers = users.filter(user =>
    user.email.toLowerCase().includes(search.toLowerCase())
  );

  const indexOfLastUser = currentPage * usersPerPage;
  const indexOfFirstUser = indexOfLastUser - usersPerPage;
  const currentUsers = filteredUsers.slice(indexOfFirstUser, indexOfLastUser);

  return (
    <div className="container mt-4">
      <h2 className="mb-3">Lista de Usuarios</h2>
      
      <button className="btn btn-primary mb-3" onClick={fetchUsers}>
        Obtener Usuarios
      </button>

      {!isLoaded ? (
        <p className="text-center">Presiona el botón para cargar los usuarios.</p>
      ) : (
        <>
          <input
            type="text"
            placeholder="Buscar por correo"
            className="form-control mb-3"
            value={search}
            onChange={(e) => setSearch(e.target.value)}
          />
          <table className="table table-bordered">
            <thead className="thead-dark">
              <tr>
                <th>ID</th>
                <th>Rol</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Fecha de Nacimiento</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              {currentUsers.length > 0 ? (
                currentUsers.map(user => (
                  <tr key={user.id}>
                    <td>{user.id}</td>
                    <td>{user.rol_id}</td>
                    <td>{user.name}</td>
                    <td>{user.last_name}</td>
                    <td>{user.email}</td>
                    <td>{user.phone}</td>
                    <td>{user.birth_date}</td>
                    <td>
                      <Link to={`/editUser/${user.id}`} className="btn btn-warning me-2">Editar</Link>
                      <button className="btn btn-danger" onClick={() => deleteUser(user.id)}>Eliminar</button>
                    </td>
                  </tr>
                ))
              ) : (
                <tr>
                  <td colSpan="8" className="text-center">No hay usuarios disponibles.</td>
                </tr>
              )}
            </tbody>
          </table>

          <div className="d-flex justify-content-center">
            <button
              className="btn btn-secondary me-2"
              onClick={() => setCurrentPage(prev => Math.max(prev - 1, 1))}
              disabled={currentPage === 1}
            >
              Anterior
            </button>
            <span>Página {currentPage}</span>
            <button
              className="btn btn-secondary ms-2"
              onClick={() => setCurrentPage(prev => (indexOfLastUser < filteredUsers.length ? prev + 1 : prev))}
              disabled={indexOfLastUser >= filteredUsers.length}
            >
              Siguiente
            </button>
          </div>
        </>
      )}
    </div>
  );
}

export default TableUsers;
*/