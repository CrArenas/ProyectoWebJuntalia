import React, { useState, useEffect } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';

function EditUser() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [user, setUser] = useState({
    rol_id: '',
    name: '',
    last_name: '',
    email: '',
    phone: '',
    birth_date: ''
  });

  useEffect(() => {
    fetch(`http://127.0.0.1:8000/api/users/${id}`)
      .then(res => res.json())
      .then(data => setUser(data))
      .catch(err => console.log('Error:', err));
  }, [id]);

  function handleChange(e) {
    setUser({ ...user, [e.target.name]: e.target.value });
  }

  function handleSubmit(e) {
    e.preventDefault();

    fetch(`http://127.0.0.1:8000/api/users/${id}`, {
      method: 'PUT',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(user)
    })
      .then(() => {
        alert('Usuario actualizado correctamente');
        navigate('/UserTable');
      })
      .catch(err => console.log('Error:', err));
  }

  return (
    <div className="container mt-5">
      <div className="card shadow-lg p-4">
        <h2 className="text-center mb-4 text-warning">Editar Usuario</h2>
        <form onSubmit={handleSubmit}>
          <label>Rol</label>
          <select className="form-control mb-2" name="rol_id" value={user.rol_id} onChange={handleChange}>
            <option value="1">Admin</option>
            <option value="2">Usuario</option>
          </select>

          <input type="text" name="name" className="form-control mb-2" value={user.name} onChange={handleChange} />
          <input type="text" name="last_name" className="form-control mb-2" value={user.last_name} onChange={handleChange} />
          <input type="email" name="email" className="form-control mb-2" value={user.email} onChange={handleChange} />
          <input type="text" name="phone" className="form-control mb-2" value={user.phone} onChange={handleChange} />
          <input type="date" name="birth_date" className="form-control mb-2" value={user.birth_date} onChange={handleChange} />

          <div className="d-flex justify-content-between">
            <button type="submit" className="btn btn-warning">Guardar Cambios</button>
            <button type="button" className="btn btn-secondary" onClick={() => navigate("/UserTable")}>Volver</button>
          </div>
        </form>
      </div>
    </div>
  );
}

export default EditUser;





/*Antes de los estilos
import React, { useState, useEffect } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';

function EditUser() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [user, setUser] = useState({
    rol_id: '',
    name: '',
    last_name: '',
    email: '',
    phone: '',
    birth_date: ''
  });

  useEffect(() => {
    fetch(`http://127.0.0.1:8000/api/users/${id}`)
      .then(res => res.json())
      .then(data => setUser(data))
      .catch(err => console.log('Error:', err));
  }, [id]);

  function handleChange(e) {
    setUser({ ...user, [e.target.name]: e.target.value });
  }

  function handleSubmit(e) {
    e.preventDefault();
  
    // ⚠️ VALIDACIONES antes de enviar la solicitud
    if (!user.name || !user.last_name || !user.email || !user.phone || !user.birth_date) {
      alert('Todos los campos son obligatorios');
      return;
    }
  
    if (!/^\S+@\S+\.\S+$/.test(user.email)) {
      alert('El email no es válido');
      return;
    }
  
    if (user.phone.length !== 10) {
      alert('El teléfono debe tener exactamente 10 dígitos');
      return;
    }
  
    if (new Date().getFullYear() - new Date(user.birth_date).getFullYear() < 16) {
      alert('El usuario debe tener al menos 16 años');
      return;
    }
  
    fetch(`http://127.0.0.1:8000/api/users/${id}`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        rol_id: parseInt(user.rol_id),  // 🔴 Convertirlo a número
        name: user.name,
        last_name: user.last_name,
        email: user.email,
        phone: user.phone,
        birth_date: user.birth_date
      })
    })
      .then(res => res.json())
      .then(data => {
        console.log('Usuario actualizado:', data);
        alert('Usuario actualizado correctamente');
        navigate('/UserTable'); // Redirige a la tabla de usuarios
      })
      .catch(err => console.log('Error:', err));
  }
  

  return (
    <div className="container mt-4">
      <h2>Editar Usuario</h2>
      <form onSubmit={handleSubmit}>
        <div className="mb-3">
          <label>Rol</label>
          <select className="form-control" name="rol_id" value={user.rol_id} onChange={handleChange} required>
            <option value="1">1-Admin</option>
            <option value="2">2-Usuario</option>
          </select>
        </div>

        <div className="mb-3">
          <label>Nombre</label>
          <input type="text" className="form-control" name="name" value={user.name} onChange={handleChange} required />
        </div>

        <div className="mb-3">
          <label>Apellido</label>
          <input type="text" className="form-control" name="last_name" value={user.last_name} onChange={handleChange} required />
        </div>

        <div className="mb-3">
          <label>Email</label>
          <input type="email" className="form-control" name="email" value={user.email} onChange={handleChange} required />
        </div>

        <div className="mb-3">
          <label>Teléfono</label>
          <input type="text" className="form-control" name="phone" value={user.phone} onChange={handleChange} required />
        </div>

        <div className="mb-3">
          <label>Fecha de Nacimiento</label>
          <input type="date" className="form-control" name="birth_date" value={user.birth_date} onChange={handleChange} required />
        </div>

        <button type="submit" className="btn btn-primary">Guardar Cambios</button>
        <button type="submit" className="btn btn-primary">volver</button>

      </form>
    </div>
  );
}

export default EditUser;*/
