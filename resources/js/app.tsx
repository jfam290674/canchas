import React from 'react';
import ReactDOM from 'react-dom/client'; // Cambiar a 'react-dom/client' para React 18

const App = () => {
    return <h1 className="text-3xl font-bold underline">¡Hola, React + Tailwind!</h1>;
};

// Seleccionar el contenedor raíz
const rootElement = document.getElementById('root');

// Crear el root para React 18
if (rootElement) {
    const root = ReactDOM.createRoot(rootElement);
    root.render(<App />);
}
