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

## Ejemplos peticiones

```
Ejemplo 1 - Petición JSON

{
  "dna": [
    "CTTCGA",
    "CAGTGC",
    "TTACTG",
    "CGAAAC",
    "TCCATT",
    "TCACTA"
  ]
}


Ejemplo 2 - Petición JSON

{
  "dna": [
    "ATTCGA",
    "CAGTGC",
    "ATACTG",
    "AGAAAC",
    "TCCCTT",
    "TCACTA"
  ]
}


Ejemplo 3 - Petición JSON

{
  "dna": [
    "ATTCGA",
    "CAGTGC",
    "ATAATG",
    "AGAAAT",
    "TCCCTC",
    "TCACTG"
  ]
}


Ejemplo 4 - Petición JSON

{
  "dna": [
    "ATTCGA",
    "CAGTGC",
    "ATAATG",
    "AGAAAT",
    "TCCCTC",
    "TCACTG"
  ]
}


Ejemplo 5 - Petición JSON

{
  "dna": [
    "ATGCGA",
    "CTGTGC",
    "ATATGG",
    "AGAAGG",
    "TCCCTA",
    "TCACTG"
  ]
}


Ejemplo 6 - Petición JSON

{
  "dna": [
    "ATGCGA",
    "ATGTGC",
    "ATATGG",
    "AGAAGG",
    "TCCCTG",
    "TCACTG"
  ]
}


Ejemplo 7 - Petición JSON

{
  "dna": [
    "ATGCGA",
    "ATGTGC",
    "ATATGG",
    "AGAAGG",
    "CCCCTG",
    "TCACTG"
  ]
}


Ejemplo 8 - Petición JSON

{
  "dna": [
    "ATGCGA",
    "CAGTGC",
    "TTATGT",
    "AGAAGG",
    "CCCCTA",
    "TCACTG"
  ]
}


Ejemplo 9 - Petición JSON

{
  "dna": [
    "ATGCGA",
    "CAGTGC",
    "TTATGT",
    "AGAAGG",
    "CCCCTA",
    "TCACTG"
  ]
}


Ejemplo 10 - Petición JSON

{
  "dna": [
    "CTTCGA",
    "CAGTGC",
    "TTACTG",
    "CGAAAC",
    "TCCATT",
    "TCACTA"
  ]
}
```

## [HOST](https://dna-production.up.railway.app/api)
