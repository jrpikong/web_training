<template>
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">List Members</h5>
            <div class="header-elements">
                <ul class="pagination pagination-sm pagination-pager justify-content-between mt-2 mt-sm-0">
                    <li class="page-item"><a href="add_quiz" class="page-link"><i class="icon-file-plus2"></i> Add New</a></li>
                </ul>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-xs table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Phone Number</th>
                    <th>Postal Code</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ListQuiz"
    }
</script>