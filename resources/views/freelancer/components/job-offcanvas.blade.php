<!-- Offcanvas -->
<div class="offcanvas offcanvas-end shadow-sm" tabindex="-1" id="{{ $offcanvasId }}" aria-labelledby="jobDetailsLabel" style="width: 900px; z-index: 100000; background-color: #ffffff;">
  <div class="offcanvas-header border-bottom py-3 px-4 align-items-center">
    <button type="button" class="btn btn-link text-decoration-none" data-bs-dismiss="offcanvas" aria-label="Close" style="color: #004b7d !important;"
            onmouseenter="this.style.opacity='0.8'" onmouseleave="this.style.opacity='1'">
      <i class="bi bi-arrow-left fs-4"></i>
    </button>

    <h5 class="offcanvas-title mx-auto fw-bold" id="jobDetailsLabel" style="color: #004b7d !important;">
      {{ $d['title'] }}
    </h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"
            onmouseenter="this.style.opacity='0.8'" onmouseleave="this.style.opacity='1'"></button>
  </div>

  <div class="offcanvas-body d-flex p-4 gap-4">
    <!-- Main Content -->
    <div class="flex-grow-1" style="max-width: 65%;">
      <small class="text-muted mb-3 d-block">
        Posted {{ \Carbon\Carbon::parse($d['createdAt'])->diffForHumans() }} · Worldwide
      </small>

      <div class="mt-2">
        <span class="badge bg-light text-dark border" style="color: #004b7d !important; font-size: 0.9rem;">
          <i class="bi bi-star-fill me-1"></i> Specialized profiles can help you better highlight your expertise.
        </span>
      </div>

      <h6 class="mt-4 fw-bold" style="color: #004b7d !important;">Summary</h6>
      <p class="text-dark" style="line-height: 1.6;">{{ $d['description'] }}</p>

      <h6 class="mt-4 fw-bold" style="color: #004b7d !important;">Details</h6>
      <dl class="row">
        <dt class="col-sm-4">Job Provider ID</dt>
        <dd class="col-sm-8">{{ $d['jobProviderId'] }}</dd>
        <dt class="col-sm-4">Freelancer ID</dt>
        <dd class="col-sm-8">{{ $d['freelancerId'] ?? 'N/A' }}</dd>
        <dt class="col-sm-4">Team ID</dt>
        <dd class="col-sm-8">{{ $d['teamId'] ?? 'N/A' }}</dd>
        <dt class="col-sm-4">Amount</dt>
        <dd class="col-sm-8">${{ number_format($d['amount'], 2) }}</dd>
        <dt class="col-sm-4">Offer Date</dt>
        <dd class="col-sm-8">{{ \Carbon\Carbon::parse($d['offerDate'])->format('M d, Y h:i A') }}</dd>
        <dt class="col-sm-4">Status</dt>
        <dd class="col-sm-8">{{ $d['status'] }}</dd>
        <dt class="col-sm-4">Job Offer Duration</dt>
        <dd class="col-sm-8">{{ $d['jobOfferDuration'] }}</dd>
        <dt class="col-sm-4">Experience Level</dt>
        <dd class="col-sm-8">{{ $d['experienceLevel'] }}</dd>
        <dt class="col-sm-4">Job Type</dt>
        <dd class="col-sm-8">{{ $d['jobType'] }}</dd>
        <dt class="col-sm-4">Minimum Success Score</dt>
        <dd class="col-sm-8">{{ $d['minimmumSuccessScore'] }}</dd>
        <dt class="col-sm-4">Minimum Earning Score</dt>
        <dd class="col-sm-8">{{ $d['minimumEarningScore'] }}</dd>
        <dt class="col-sm-4">Required Talent Type</dt>
        <dd class="col-sm-8">{{ $d['requiredTalentType'] }}</dd>
        <dt class="col-sm-4">Languages</dt>
        <dd class="col-sm-8">{{ $d['languages'] }}</dd>
        <dt class="col-sm-4">Countries</dt>
        <dd class="col-sm-8">{{ $d['countries'] }}</dd>
        <dt class="col-sm-4">Created At</dt>
        <dd class="col-sm-8">{{ \Carbon\Carbon::parse($d['createdAt'])->format('M d, Y h:i A') }}</dd>
        <dt class="col-sm-4">Updated At</dt>
        <dd class="col-sm-8">{{ \Carbon\Carbon::parse($d['updatedAt'])->format('M d, Y h:i A') }}</dd>
      </dl>

      <h6 class="mt-4 fw-bold" style="color: #004b7d !important;">Skills Required</h6>
      <ul class="list-unstyled ps-0">
        @forelse($d['skillsRequired'] as $skill)
          <li class="mb-2 d-flex align-items-center">
            <i class="bi bi-check-circle-fill me-2" style="color: #004b7d !important;"></i> {{ $skill }}
          </li>
        @empty
          <li>No skills specified</li>
        @endforelse
      </ul>

      <h6 class="mt-4 fw-bold" style="color: #004b7d !important;">Milestones</h6>
      <div class="accordion" id="milestonesAccordion">
        @forelse($d['milestones'] as $index => $milestone)
          <div class="accordion-item">
            <h2 class="accordion-header" id="milestoneHeading{{ $index }}">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#milestoneCollapse{{ $index }}" aria-expanded="false" aria-controls="milestoneCollapse{{ $index }}">
                {{ $milestone['title'] }} - ${{ number_format($milestone['amount'], 2) }}
              </button>
            </h2>
            <div id="milestoneCollapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="milestoneHeading{{ $index }}">
              <div class="accordion-body">
                <p><strong>Description:</strong> {{ $milestone['description'] }}</p>
                <p><strong>Work Done:</strong> {{ $milestone['workDone'] }}</p>
                <p><strong>Status:</strong> {{ $milestone['jobMilestoneStatus'] }}</p>
                <p><strong>Due On:</strong> {{ \Carbon\Carbon::parse($milestone['dueOn'])->format('M d, Y h:i A') }}</p>
                <p><strong>Completed On:</strong> {{ \Carbon\Carbon::parse($milestone['completedOn'])->format('M d, Y h:i A') }}</p>
              </div>
            </div>
          </div>
        @empty
          <p>No milestones defined</p>
        @endforelse
      </div>

      <h6 class="mt-4 fw-bold" style="color: #004b7d !important;">Flags</h6>
      <dl class="row">
        <dt class="col-sm-4">Published</dt>
        <dd class="col-sm-8">{{ $d['isPublished'] ? 'Yes' : 'No' }}</dd>
        <dt class="col-sm-4">Deleted</dt>
        <dd class="col-sm-8">{{ $d['isDeleted'] ? 'Yes' : 'No' }}</dd>
        <dt class="col-sm-4">Deleted At</dt>
        <dd class="col-sm-8">{{ $d['deletedAt'] ?? 'N/A' }}</dd>
        <dt class="col-sm-4">Sponsored</dt>
        <dd class="col-sm-8">{{ $d['isSponsored'] ? 'Yes' : 'No' }}</dd>
        <dt class="col-sm-4">Highlighted</dt>
        <dd class="col-sm-8">{{ $d['isHighlighted'] ? 'Yes' : 'No' }}</dd>
        <dt class="col-sm-4">Featured</dt>
        <dd class="col-sm-8">{{ $d['isFeatured'] ? 'Yes' : 'No' }}</dd>
      </dl>
    </div>

    <!-- Sidebar -->
    <div class="border-start ps-4 d-flex flex-column" style="width: 35%; background-color: #f8f9fa; border-radius: 8px; padding: 1.5rem;">
      <a href="/job-view/{{$d['id']}}" class="btn w-100 mb-2" style="background-color: #004b7d !important; color: #fff; font-weight: 500;"
              onmouseenter="this.style.backgroundColor='#003a61'; this.style.transform='scale(1.05)'"
              onmouseleave="this.style.backgroundColor='#004b7d'; this.style.transform='scale(1)'"
              onmousedown="this.style.transform='scale(0.98)'" onmouseup="this.style.transform='scale(1.05)'">
        Apply now
    </a>
      <button class="btn w-100 mb-2" style="border-color: #004b7d !important; color: #004b7d !important; font-weight: 500;"
              onmouseenter="this.style.backgroundColor='#e6f0fa'; this.style.color='#003a61'"
              onmouseleave="this.style.backgroundColor='transparent'; this.style.color='#004b7d'"
              onmousedown="this.style.transform='scale(0.98)'" onmouseup="this.style.transform='scale(1)'">
        Save job
      </button>
      <button class="btn w-100 mb-4" style="border-color: #dc3545 !important; color: #dc3545 !important; font-weight: 500;"
              onmouseenter="this.style.backgroundColor='#fae0e0'; this.style.color='#a71d2a'"
              onmouseleave="this.style.backgroundColor='transparent'; this.style.color='#dc3545'"
              onmousedown="this.style.transform='scale(0.98)'" onmouseup="this.style.transform='scale(1)'">
        Flag as inappropriate
      </button>

      <div class="mt-auto">
        <h6 class="fw-bold mb-3" style="color: #004b7d !important;">About the client</h6>
        <p class="mb-2 text-dark"><strong>Country:</strong> {{ $d['countries'] }}</p>
        <p class="mb-2 text-dark"><strong>Budget:</strong> ${{ number_format($d['amount'], 2) }}</p>
        <p class="mb-0 text-dark"><strong>Status:</strong> {{ $d['status'] }}</p>
      </div>
    </div>
  </div>
</div>
