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

    // Validar nombre y apellido
    if (!formData.name.trim()) newErrors.name = "El nombre es obligatorio.";
    if (!formData.last_name.trim()) newErrors.last_name = "El apellido es obligatorio.";

    // Validar correo
    if (!formData.email.includes("@")) newErrors.email = "Debe ser un correo válido.";

    // Validar teléfono
    if (!/^\d{10}$/.test(formData.phone)) newErrors.phone = "El teléfono debe tener 10 dígitos.";

    // Validar fecha de nacimiento (+16 años)
    const birthYear = new Date(formData.birth_date).getFullYear();
    const currentYear = new Date().getFullYear();
    if (currentYear - birthYear < 16) newErrors.birth_date = "El usuario debe ser mayor de 16 años.";

    // Validar contraseñas
    if (formData.password.length < 8) newErrors.password = "La contraseña debe tener al menos 8 caracteres.";
    if (formData.password !== formData.confirmPassword) newErrors.confirmPassword = "Las contraseñas no coinciden.";

    // Si hay errores, no enviar el formulario
    if (Object.keys(newErrors).length > 0) {
      setErrors(newErrors);
      return;
    }

    // Enviar datos al backend
    fetch('http://127.0.0.1:8000/api/users', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(formData)
    })
      .then(res => res.json())
      .then(() => {
        alert("✅ Usuario creado correctamente");
        navigate("/UserTable"); // Redirigir a la tabla de usuarios
      })
      .catch(() => alert("❌ Error al crear usuario"));
  };
*/
  return (
    <div className="container mt-4">
      <h2>Formulario de Usuario</h2>
      <form onSubmit={handleSubmit}>
        {/* Rol */}
        <label>Rol</label>
        <select className="form-control mb-2" name="rol_id" value={formData.rol_id} onChange={handleChange}>
          <option value="1">Admin</option>
          <option value="2">Usuario</option>
        </select>

        {/* Nombre */}
        <input type="text" name="name" className="form-control mb-2" placeholder="Nombre" value={formData.name} onChange={handleChange} />
        {errors.name && <div className="text-danger">{errors.name}</div>}

        {/* Apellido */}
        <input type="text" name="last_name" className="form-control mb-2" placeholder="Apellido" value={formData.last_name} onChange={handleChange} />
        {errors.last_name && <div className="text-danger">{errors.last_name}</div>}

        {/* Correo */}
        <input type="email" name="email" className="form-control mb-2" placeholder="Correo" value={formData.email} onChange={handleChange} />
        {errors.email && <div className="text-danger">{errors.email}</div>}

        {/* Contraseña */}
        <input type="password" name="password" className="form-control mb-2" placeholder="Contraseña" value={formData.password} onChange={handleChange} />
        {errors.password && <div className="text-danger">{errors.password}</div>}

        {/* Confirmar Contraseña */}
        <input type="password" name="confirmPassword" className="form-control mb-2" placeholder="Confirmar Contraseña" value={formData.confirmPassword} onChange={handleChange} />
        {errors.confirmPassword && <div className="text-danger">{errors.confirmPassword}</div>}

        {/* Teléfono */}
        <input type="text" name="phone" className="form-control mb-2" placeholder="Teléfono" value={formData.phone} onChange={handleChange} />
        {errors.phone && <div className="text-danger">{errors.phone}</div>}

        {/* Fecha de Nacimiento */}
        <input type="date" name="birth_date" className="form-control mb-2" value={formData.birth_date} onChange={handleChange} />
        {errors.birth_date && <div className="text-danger">{errors.birth_date}</div>}

        {/* Botones */}
        <div className="mt-3">
          <button type="submit" className="btn btn-primary me-2">Guardar</button>
          <button type="button" className="btn btn-secondary" onClick={() => navigate("/UserTable")}>Volver</button>
        </div>
      </form>
    </div>
  );
}

export default FormUsers;
