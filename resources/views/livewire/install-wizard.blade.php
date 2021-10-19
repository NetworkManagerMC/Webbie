<div class="card shadow-lg border-0 rounded-lg">
    <div class="card-header">
        <h3 class="text-center font-weight-light my-4">Install ({{ $this->progress }})</h3>
    </div>

    <div class="card-body">
        <form wire:submit.prevent="complete" method="POST">

            Wizard content

            <div class="d-flex align-items-center justify-content-end mt-4 mb-0">
                <button class="btn btn-primary"type="submit">Complete</button>
            </div>
        </form>
    </div>
</div>
