# Mini jeu de combats

Mini jeu de combat developpe en PHP avec une architecture MVC. Le projet permet de creer et gerer des personnages (ajout, modification, suppression), puis de jouer des affrontements entre eux. Le joueur choisit un personnage actif, attaque les autres, inflige des degats et gagne de l'experience pour progresser en niveau. Les donnees des personnages (nom, degats, experience, niveau) sont stockees en base MySQL et l'interface est realisee avec Bootstrap.

## Installation

1. Cloner ou copier le projet dans ton dossier local.
2. Creer une base de donnees MySQL nommee `combats`.
3. Creer la table `personnages`:

```sql
CREATE TABLE personnages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(100) NOT NULL,
  degats INT NOT NULL DEFAULT 0,
  experience INT NOT NULL DEFAULT 0,
  niveau INT NOT NULL DEFAULT 0
);
```

4. Verifier la config BDD dans `model/Manager.php`:
   - base: `combats`
   - utilisateur: `root`
   - mot de passe: vide (`''`)
5. Demarrer un serveur PHP a la racine du projet:

```bash
php -S localhost:8000
```

6. Ouvrir le projet dans le navigateur:
   - `http://localhost:8000/index.php`
