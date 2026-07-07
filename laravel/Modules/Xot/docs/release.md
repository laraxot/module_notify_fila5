# Semantic Versioning & Release Process

This module follows Semantic Versioning 2.0.0 and uses an automated release workflow powered by GitHub Actions.

## Versioning Strategy

- **Format**: `xot-vX.Y.Z` (e.g., `xot-v1.2.3`)
- **Tags**: Automatically created on push to `main` or `dev` branches.

## Commit Message Convention

To trigger the correct version bump, commit messages MUST follow the [Conventional Commits](https://www.conventionalcommits.org/) specification:

- `feat:` -> Minor version bump (e.g., 1.1.0 -> 1.2.0)
- `fix:` -> Patch version bump (e.g., 1.1.0 -> 1.1.1)
- `feat!:` or `BREAKING CHANGE:` -> Major version bump (e.g., 1.1.0 -> 2.0.0)
- `docs:`, `chore:`, `style:`, `refactor:`, `test:` -> No version bump

## Workflow

The GitHub Action `.github/workflows/semantic-versioning.yml` (located in the module directory) performs the following steps:

1. **Checkout**: Retrieves the codebase.
2. **Build Artifact**: Creates a tarball of the module (`laravel/Modules/Xot`).
3. **Attest Build Provenance**: Generates SLSA provenance attestation for supply chain security.
4. **Bump Version & Push Tag**:
   - Analyzes commits since the last tag.
   - Calculates the new version.
   - Pushes the new tag `xot-v...` to the repository.
   - Creates a GitHub Release with auto-generated changelog.

## Configuration

- **Workflow**: `laravel/Modules/Xot/.github/workflows/semantic-versioning.yml`
- **Release Config**: `laravel/Modules/Xot/.releaserc.json`
