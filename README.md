# Mutacion de ADN

API REST desarrollada con Laravel que detecta mutaciones en cadenas de ADN y guarda los registros en base de datos.

---

## Endpoints disponibles

| Método | Ruta                 | Descripción                                                                             |
| ------ | -------------------- | --------------------------------------------------------------------------------------- |
| GET    | `/api/`              | Mensaje de bienvenida simple                                                            |
| GET    | `/api/mutation`      | Estadísticas generales de mutaciones detectadas y no detectadas                         |
| POST   | `/api/mutation`      | Verifica si una cadena de ADN contiene mutación, guarda el registro y retorna resultado |
| GET    | `/api/mutation/list` | Lista las últimas 10 verificaciones con detalle de ADN, resultado y fecha               |

---

## Uso

### GET /api/mutation

Retorna JSON con:

-   count_mutations: número total de mutaciones detectadas.
-   count_no_mutation: número total sin mutación.
-   ratio: proporción mutaciones / total.

### POST /api/mutation

Content-Type: application/json

```
{
  "dna": ["ATGCGA", "CAGTGC", "TTATGT", "AGAAGG", "CCCCTA", "TCACTG"]
}
```

El arreglo dna debe contener cadenas del mismo tamaño (matriz cuadrada NxN).
Retorna si se detectó mutación, guarda el log en la base de datos.

### GET /api/mutation/list

Retorna un arreglo con los últimos 10 registros, cada uno con:

-   Secuencia ADN
-   Resultado mutación
-   Fecha

## [HOST](https://dna-production.up.railway.app/api)
