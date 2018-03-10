<?= $helper->getHead($base_layout_exists, $entity_class_name.' index'); ?>


{% block stylesheets %}
    <link href="{{ asset('build/<?= $entity_class_name; ?>.css') }}" rel="stylesheet">
{% endblock %}

{% block content %}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="page-content__header">
                <div>
                    <h2 class="page-content__header-heading">Lieste des Structures <?= $entity_class_name; ?></h2>
                </div>
            </div>
            <div class="m-datatable">
                <table id="datatable" data-url="{{ path('<?= $entity_class_name; ?>_paginate') }}" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <?php foreach ($entity_fields as $field): ?><th><?= ucfirst($field['fieldName']); ?></th>
                                    <?php endforeach; ?><th>actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            {% for <?= $entity_var_singular; ?> in <?= $entity_var_plural; ?> %}
                                <tr>
                                    <?php foreach ($entity_fields as $field): ?><td>{{ <?= $helper->getEntityFieldPrintCode($entity_var_singular, $field); ?> }}</td>
                                    <?php endforeach; ?><td>
                                        <a  href="{{ path('<?= $route_name; ?>_show', {'<?= $entity_identifier; ?>': <?= $entity_var_singular; ?>.<?= $entity_identifier; ?>}) }}" class="btn btn-flat btn-default">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-flat btn-default" href="{{ path('<?= $route_name; ?>_edit', {'<?= $entity_identifier; ?>': <?= $entity_var_singular; ?>.<?= $entity_identifier; ?>}) }}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            {% else %}
                                <tr>
                                    <td colspan="<?= (count($entity_fields) + 1); ?>">Aucun élément trouvé</td>
                                </tr>
                            {% endfor %}
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
</div>

{% endblock %}

{% block javascripts %}
    <script src="{{ asset('build/<?= $entity_class_name; ?>.js') }}"></script>
    <!-- copy this code into the previous js file -->
    <script>
        $(document).ready(function() {

            var $url = $("#datatable").data('url');
            $("#datatable").DataTable({
                "processing": true,
                "serverSide": true,
                "sAjaxDataProp": "data",
                ajax: {
                    url: $url,
                    type: 'POST'
                },
                "columns": [
                    <?php foreach ($entity_fields as $field): ?>
                    {data: "<?= $field['fieldName']; ?>"},
                    {data: "actions"}
                    <?php endforeach; ?>
                ],
                "language": {
                    "lengthMenu": "_MENU_ éléments par page",
                    "zeroRecords": "Aucun élément trouvé",
                    "info": "Voir page _PAGE_ sur _PAGES_",
                    "infoEmpty": "Aucun élément trouvé",
                    "search": "Rechercher : ",
                    "paginate": {
                        "first":      "Début",
                        "last":       "Fin",
                        "next":       "Suivant",
                        "previous":   "Précedent"
                    },
                    "infoFiltered": "(filtered from _MAX_ total records)"
                }
            });
        });
    </script>
    <!-- -->
{% endblock %}