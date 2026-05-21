import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';

function FormUsers() {
  const navigate = useNavigate();
  const [formData, setFormData] = useState({
    rol_id: '2',
    name: '',
    last_name: '',
    email: '',
    password: '',
    confirmPassword: '',
    phone: '',
    birth_date: ''
  });

  const [errors, setErrors] = useState({});

  const handleChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    let newErrors = {};

    // Validaciones
    if (!formData.name.trim()) newErrors.name = "El nombre es obligatorio.";
    if (!formData.last_name.trim()) newErrors.last_name = "El apellido es obligatorio.";
    if (!formData.email.includes("@")) newErrors.email = "Debe ser un correo válido.";
    if (!/^\d{10}$/.test(formData.phone)) newErrors.phone = "El teléfono debe tener 10 dígitos.";
    const birthYear = new Date(formData.birth_date).getFullYear();
    if (new Date().getFullYear() - birthYear < 16) newErrors.birth_date = "Debe ser mayor de 16 años.";
    if (formData.password.length < 8) newErrors.password = "Mínimo 8 caracteres.";
    if (formData.password !== formData.confirmPassword) newErrors.confirmPassword = "Las contraseñas no coinciden.";

    if (Object.keys(newErrors).length > 0) {
      setErrors(newErrors);
      return;
    }

    // Enviar datos
    fetch('http://127.0.0.1:8000/api/users', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(formData)
    })
      .then(() => {
        alert("✅ Usuario creado correctamente");
        navigate("/UserTable");
      })
      .catch(() => alert("❌ Error al crear usuario"));
  };

  return (
    <div className="container mt-5">
      <div className="card shadow-lg p-4">
        <h2 className="text-center mb-4 text-primary">Crear Usuario</h2>
        <form onSubmit={handleSubmit}>
          <div className="mb-3">
            <label>Rol</label>
            <select className="form-control" name="rol_id" value={formData.rol_id} onChange={handleChange}>
              <option value="1">Admin</option>
              <option value="2">Usuario</option>
            </select>
          </div>

          <div className="row">
            <div className="col-md-6">
              <label>Nombre</label>
              <input type="text" name="name" className="form-control" value={formData.name} onChange={handleChange} />
              {errors.name && <small className="text-danger">{errors.name}</small>}
            </div>
            <div className="col-md-6">
              <label>Apellido</label>
              <input type="text" name="last_name" className="form-control" value={formData.last_name} onChange={handleChange} />
              {errors.last_name && <small className="text-danger">{errors.last_name}</small>}
            </div>
          </div>

          <div className="mb-3">
            <label>Correo</label>
            <input type="email" name="email" className="form-control" value={formData.email} onChange={handleChange} />
            {errors.email && <small className="text-danger">{errors.email}</small>}
          </div>

          <div className="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" className="form-control" value={formData.password} onChange={handleChange} />
            {errors.password && <small className="text-danger">{errors.password}</small>}
          </div>

          <div className="mb-3">
            <label>Confirmar Contraseña</label>
            <input type="password" name="confirmPassword" className="form-control" value={formData.confirmPassword} onChange={handleChange} />
            {errors.confirmPassword && <small className="text-danger">{errors.confirmPassword}</small>}
          </div>

          <div className="mb-3">
            <label>Teléfono</label>
            <input type="text" name="phone" className="form-control" value={formData.phone} onChange={handleChange} />
            {errors.phone && <small className="text-danger">{errors.phone}</small>}
          </div>

          <div className="mb-3">
            <label>Fecha de Nacimiento</label>
            <input type="date" name="birth_date" className="form-control" value={formData.birth_date} onChange={handleChange} />
            {errors.birth_date && <small className="text-danger">{errors.birth_date}</small>}
          </div>

          <div className="d-flex justify-content-between">
            <button type="submit" className="btn btn-primary">Guardar</button>
            <button type="button" className="btn btn-secondary" onClick={() => navigate("/UserTable")}>Volver</button>
          </div>
        </form>
      </div>
      
    </div>
    
    

  );
}

export default FormUsers;
