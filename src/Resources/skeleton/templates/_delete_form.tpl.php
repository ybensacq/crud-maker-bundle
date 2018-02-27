<form method="post" action="{{ path('<?= $route_name ?>_delete', {'<?= $entity_identifier ?>': identifier}) }}" onsubmit="return confirm('Êtes vous certain de vouloir supprimer cet élément ?');">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token('delete' ~ identifier) }}">
    <input type="submit" class="btn btn-danger" value="Supprimer">
</form>