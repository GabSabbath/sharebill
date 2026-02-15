# What's this?

![Bill](public/Bill-squigly.svg)
An open-source website to manage your finances with a partner. Share your bills
with Bill and he'll help you out. Well, not yet. This project is far from a
usable stage and is only in its development debut. More to come later.

# Tech Stack & Tools

- Vuejs (frontend)
- Laravel (backend)
- Inertia to bind Vuejs and Laravel
- Vite
- Docker: Everything in the dev environment runs inside docker containers
- Linting/Formatting
    - Eslint for typescript/javascript/Vue
    - Pint for Laravel/php
    - Prettier for formatting most files
- Make: for simplifying commands. _`make setup` and `make destroy` are your best friends_

# Model

![model diagram](doc/diagrams/model.svg)

# Documentation

PlantUML is used for generating diagrams. See makefile and
`/doc/diagrams/README.md` for more info
