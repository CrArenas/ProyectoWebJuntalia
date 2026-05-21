document.addEventListener("DOMContentLoaded", function () {
    async function loadEventsChart() {
        try {
            console.log("🔄 Cargando datos de eventos...");

            const response = await fetch("/api/events/chart", {
                method: "GET",
                credentials: "include",
                headers: { "Accept": "application/json" }
            });

            if (!response.ok) {
                if (response.status === 403) {
                    alert("❌ No tienes permisos para ver esta gráfica.");
                    window.location.href = "/home"; // 🔹 Redirigir a la home
                    return;
                }
                throw new Error(`Error ${response.status}: ${await response.text()}`);
            }

            const data = await response.json();
            console.log("📊 Datos de eventos recibidos:", data);

            if (!data.categories || !data.counts || data.categories.length === 0) {
                console.warn("⚠️ No hay datos para la gráfica de eventos.");
                return;
            }

            let trace = {
                x: data.categories,
                y: data.counts,
                type: "bar",
                marker: { color: "blue" }
            };

            let layout = {
                title: "Eventos por Categoría",
                xaxis: { title: "Categoría" },
                yaxis: { title: "Cantidad de Eventos" }
            };

            Plotly.newPlot("eventsChart", [trace], layout);
            console.log("✅ Gráfica de eventos generada correctamente.");
        } catch (error) {
            console.error("❌ Error al cargar la gráfica de eventos:", error);
        }
    }

    if (document.getElementById("eventsChart")) {
        loadEventsChart();
    }

    async function loadInscriptionsChart() {
        try {
            console.log("🔄 Cargando datos de inscripciones...");

            const response = await fetch("/api/inscriptions/chart", {
                method: "GET",
                credentials: "include",
                headers: { "Accept": "application/json" }
            });

            if (!response.ok) {
                if (response.status === 403) {
                    alert("❌ No tienes permisos para ver esta gráfica.");
                    window.location.href = "/home";
                    return;
                }
                throw new Error(`Error ${response.status}: ${await response.text()}`);
            }

            const data = await response.json();
            console.log("📊 Datos de inscripciones recibidos:", data);

            if (!data.events || !data.counts || data.events.length === 0) {
                console.warn("⚠️ No hay datos para la gráfica de inscripciones.");
                return;
            }

            const colors = data.events.map((_, i) => `hsl(${(i * 360) / data.events.length}, 70%, 50%)`);

            let trace = {
                labels: data.events,  // Nombres de los eventos
                values: data.counts,   // Cantidad de inscripciones
                type: "pie",
                textinfo: "label+percent", // Muestra nombres y porcentaje
                marker: { colors }
            };

            let layout = {
                title: "Inscripciones por Evento"
            };

            Plotly.newPlot("inscriptionsChart", [trace], layout);
            console.log("✅ Gráfica de inscripciones generada correctamente.");
        } catch (error) {
            console.error("❌ Error al cargar la gráfica de inscripciones:", error);
        }
    }

    if (document.getElementById("inscriptionsChart")) {
        loadInscriptionsChart();
    }
});
