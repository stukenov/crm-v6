<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Finance_DB
        Schema::create('GeneralLedger', function (Blueprint $table) {
            $table->id();
            $table->string('AccountNumber');
            $table->string('AccountName');
            $table->decimal('DebitAmount', 10, 2);
            $table->decimal('CreditAmount', 10, 2);
            $table->date('TransactionDate');
            $table->string('Reference');
            $table->timestamps();
        });

        Schema::create('AccountsReceivable', function (Blueprint $table) {
            $table->id();
            $table->integer('CustomerID');
            $table->string('InvoiceNumber');
            $table->string('Amount');
            $table->string('DueDate');
            $table->string('Status');
            $table->timestamps();
        });

        Schema::create('AccountsPayable', function (Blueprint $table) {
            $table->id();
            $table->integer('SupplierID');
            $table->string('InvoiceNumber');
            $table->decimal('Amount', 15, 2);
            $table->date('DueDate');
            $table->enum('Status', ['Pending', 'Paid', 'Overdue']);
            $table->timestamps();
        });

        Schema::create('AssetManagement', function (Blueprint $table) {
            $table->id();
            $table->string('AssetName');
            $table->date('PurchaseDate');
            $table->decimal('Cost', 15, 2);
            $table->decimal('DepreciationRate', 5, 2);
            $table->timestamps();
        });

        Schema::create('BudgetManagement', function (Blueprint $table) {
            $table->id();
            $table->integer('DepartmentID');
            $table->year('Year');
            $table->decimal('BudgetAmount', 15, 2);
            $table->decimal('SpentAmount', 15, 2);
            $table->timestamps();
        });

        Schema::create('TaxManagement', function (Blueprint $table) {
            $table->id();
            $table->string('TaxType');
            $table->decimal('Amount', 15, 2);
            $table->date('DueDate');
            $table->timestamps();
        });

        Schema::create('FinancialConsolidation', function (Blueprint $table) {
            $table->id();
            $table->string('Period');
            $table->decimal('TotalRevenue', 15, 2);
            $table->decimal('TotalExpenses', 15, 2);
            $table->decimal('ProfitOrLoss', 15, 2);
            $table->timestamps();
        });

        // HRM_DB
        Schema::create('Employees', function (Blueprint $table) {
            $table->id();
            $table->string('FirstName');
            $table->string('LastName');
            $table->integer('DepartmentID');
            $table->date('HireDate');
            $table->string('Position');
            $table->decimal('Salary', 15, 2);
            $table->timestamps();
        });

        Schema::create('Payroll', function (Blueprint $table) {
            $table->id();
            $table->integer('EmployeeID');
            $table->date('PaymentDate');
            $table->decimal('Amount', 15, 2);
            $table->decimal('TaxDeducted', 15, 2);
            $table->decimal('NetPay', 15, 2);
            $table->timestamps();
        });

        Schema::create('PerformanceManagement', function (Blueprint $table) {
            $table->id();
            $table->integer('EmployeeID');
            $table->date('EvaluationDate');
            $table->decimal('Score', 5, 2);
            $table->text('Comments');
            $table->timestamps();
        });

        Schema::create('TalentManagement', function (Blueprint $table) {
            $table->id();
            $table->integer('EmployeeID');
            $table->string('TalentType');
            $table->date('RecognitionDate');
            $table->timestamps();
        });

        Schema::create('CareerLearning', function (Blueprint $table) {
            $table->id();
            $table->integer('EmployeeID');
            $table->string('CourseName');
            $table->date('CompletionDate');
            $table->boolean('CertificateReceived');
            $table->timestamps();
        });

        // SupplyChain_DB
        Schema::create('Procurement', function (Blueprint $table) {
            $table->id();
            $table->string('OrderNumber');
            $table->integer('SupplierID');
            $table->date('OrderDate');
            $table->decimal('TotalAmount', 15, 2);
            $table->enum('Status', ['Pending', 'Approved', 'Received']);
            $table->timestamps();
        });

        Schema::create('Inventory', function (Blueprint $table) {
            $table->id();
            $table->string('ItemName');
            $table->string('ItemCode');
            $table->integer('Quantity');
            $table->integer('LocationID');
            $table->date('LastUpdate');
            $table->timestamps();
        });

        Schema::create('Warehouse', function (Blueprint $table) {
            $table->id();
            $table->string('LocationName');
            $table->string('Address');
            $table->integer('Capacity');
            $table->timestamps();
        });

        Schema::create('Transportation', function (Blueprint $table) {
            $table->id();
            $table->integer('VehicleID');
            $table->string('DriverName');
            $table->string('Route');
            $table->date('ExpectedDeliveryDate');
            $table->timestamps();
        });

        Schema::create('SupplierManagement', function (Blueprint $table) {
            $table->id();
            $table->string('SupplierName');
            $table->string('ContactPerson');
            $table->string('Phone');
            $table->string('Email');
            $table->timestamps();
        });

        // Production_DB
        Schema::create('ProductionOrders', function (Blueprint $table) {
            $table->id();
            $table->string('OrderNumber');
            $table->integer('ProductID');
            $table->integer('Quantity');
            $table->date('StartDate');
            $table->date('EndDate');
            $table->enum('Status', ['Planned', 'In Progress', 'Completed']);
            $table->timestamps();
        });

        Schema::create('ProductionPlanning', function (Blueprint $table) {
            $table->id();
            $table->integer('ProductID');
            $table->date('PlannedDate');
            $table->integer('PlannedQuantity');
            $table->timestamps();
        });

        Schema::create('QualityControl', function (Blueprint $table) {
            $table->id();
            $table->integer('OrderID');
            $table->string('InspectorName');
            $table->date('InspectionDate');
            $table->enum('Result', ['Pass', 'Fail']);
            $table->timestamps();
        });

        Schema::create('CapacityManagement', function (Blueprint $table) {
            $table->id();
            $table->integer('ResourceID');
            $table->integer('MaxCapacity');
            $table->integer('UsedCapacity');
            $table->timestamps();
        });

        Schema::create('ManufacturingReports', function (Blueprint $table) {
            $table->id();
            $table->integer('OrderID');
            $table->date('ReportDate');
            $table->integer('TotalProduced');
            $table->integer('DefectiveUnits');
            $table->timestamps();
        });

        // ProjectManagement_DB
        Schema::create('Projects', function (Blueprint $table) {
            $table->id();
            $table->string('ProjectName');
            $table->integer('ClientID');
            $table->date('StartDate');
            $table->date('EndDate');
            $table->decimal('Budget', 15, 2);
            $table->enum('Status', ['Planned', 'In Progress', 'Completed']);
            $table->timestamps();
        });

        Schema::create('Tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('ProjectID');
            $table->string('TaskName');
            $table->integer('AssignedTo');
            $table->date('DueDate');
            $table->enum('Status', ['NotStarted', 'In Progress', 'Completed']);
            $table->timestamps();
        });

        Schema::create('Resources', function (Blueprint $table) {
            $table->id();
            $table->integer('ProjectID');
            $table->string('ResourceType');
            $table->decimal('Cost', 15, 2);
            $table->timestamps();
        });

        Schema::create('ProjectCosts', function (Blueprint $table) {
            $table->id();
            $table->integer('ProjectID');
            $table->string('ExpenseType');
            $table->decimal('Amount', 15, 2);
            $table->date('Date');
            $table->timestamps();
        });

        Schema::create('ProjectReports', function (Blueprint $table) {
            $table->id();
            $table->integer('ProjectID');
            $table->date('ReportDate');
            $table->decimal('Progress', 5, 2);
            $table->timestamps();
        });

        // CRM_DB
        Schema::create('Customers', function (Blueprint $table) {
            $table->id();
            $table->string('CustomerName');
            $table->string('Phone');
            $table->string('Email');
            $table->string('Address');
            $table->timestamps();
        });

        Schema::create('Sales', function (Blueprint $table) {
            $table->id();
            $table->integer('CustomerID');
            $table->date('SaleDate');
            $table->integer('ProductID');
            $table->integer('Quantity');
            $table->decimal('TotalAmount', 15, 2);
            $table->timestamps();
        });

        Schema::create('CustomerSupport', function (Blueprint $table) {
            $table->id();
            $table->integer('CustomerID');
            $table->string('SupportTicketNumber');
            $table->text('Issue');
            $table->enum('Status', ['Open', 'InProgress', 'Closed']);
            $table->timestamps();
        });

        Schema::create('MarketingCampaigns', function (Blueprint $table) {
            $table->id();
            $table->string('CampaignName');
            $table->date('StartDate');
            $table->date('EndDate');
            $table->decimal('Budget', 15, 2);
            $table->timestamps();
        });

        // GRC_DB
        Schema::create('RiskAssessments', function (Blueprint $table) {
            $table->id();
            $table->string('RiskType');
            $table->text('Description');
            $table->enum('Likelihood', ['Low', 'Medium', 'High']);
            $table->enum('Impact', ['Low', 'Medium', 'High']);
            $table->date('AssessmentDate');
            $table->text('MitigationPlan');
            $table->timestamps();
        });

        Schema::create('InternalAudits', function (Blueprint $table) {
            $table->id();
            $table->string('AuditName');
            $table->date('AuditDate');
            $table->string('AuditorName');
            $table->text('Findings');
            $table->enum('Status', ['Open', 'InProgress', 'Closed']);
            $table->timestamps();
        });

        Schema::create('ComplianceManagement', function (Blueprint $table) {
            $table->id();
            $table->string('ComplianceType');
            $table->date('ComplianceDate');
            $table->enum('Status', ['Pending', 'Compliant', 'Non-Compliant']);
            $table->text('Comments');
            $table->timestamps();
        });

        // Analytics_DB
        Schema::create('Reports', function (Blueprint $table) {
            $table->id();
            $table->string('ReportName');
            $table->integer('CreatedBy');
            $table->date('CreationDate');
            $table->text('ReportData');
            $table->enum('ReportType', ['Financial', 'HR', 'SupplyChain', 'Project']);
            $table->timestamps();
        });

        Schema::create('Dashboards', function (Blueprint $table) {
            $table->id();
            $table->string('DashboardName');
            $table->integer('OwnerID');
            $table->date('CreationDate');
            $table->json('Widgets');
            $table->timestamps();
        });

        Schema::create('DataForecasting', function (Blueprint $table) {
            $table->id();
            $table->string('ForecastType');
            $table->string('DataPeriod');
            $table->date('ForecastDate');
            $table->decimal('ForecastedValue', 15, 2);
            $table->timestamps();
        });

        // Procurement_DB
        Schema::create('PurchaseOrders', function (Blueprint $table) {
            $table->id();
            $table->string('OrderNumber');
            $table->integer('SupplierID');
            $table->date('OrderDate');
            $table->decimal('TotalAmount', 15, 2);
            $table->enum('Status', ['Pending', 'Approved', 'Received']);
            $table->timestamps();
        });

        Schema::create('Contracts', function (Blueprint $table) {
            $table->id();
            $table->string('ContractNumber');
            $table->integer('SupplierID');
            $table->date('ContractStartDate');
            $table->date('ContractEndDate');
            $table->decimal('ContractValue', 15, 2);
            $table->enum('ContractStatus', ['Active', 'Terminated', 'Expired']);
            $table->timestamps();
        });

        Schema::create('SupplierRelations', function (Blueprint $table) {
            $table->id();
            $table->integer('SupplierID');
            $table->date('RelationStartDate');
            $table->enum('Status', ['Active', 'Inactive']);
            $table->text('Notes');
            $table->timestamps();
        });

        // PartnerManagement_DB
        Schema::create('Partners', function (Blueprint $table) {
            $table->id();
            $table->string('PartnerName');
            $table->string('PartnerType');
            $table->string('ContactPerson');
            $table->string('Phone', 15);
            $table->string('Email');
            $table->string('Address');
            $table->timestamps();
        });

        Schema::create('PartnerInteraction', function (Blueprint $table) {
            $table->id();
            $table->integer('PartnerID');
            $table->date('InteractionDate');
            $table->enum('InteractionType', ['Email', 'Phone', 'Meeting']);
            $table->text('Notes');
            $table->timestamps();
        });

        // DocumentManagement_DB
        Schema::create('Documents', function (Blueprint $table) {
            $table->id();
            $table->string('DocumentName');
            $table->string('DocumentType');
            $table->date('UploadDate');
            $table->integer('UploadedBy');
            $table->string('DocumentPath');
            $table->timestamps();
        });

        Schema::create('DocumentVersions', function (Blueprint $table) {
            $table->id();
            $table->integer('DocumentID');
            $table->string('VersionNumber');
            $table->date('UploadDate');
            $table->integer('UploadedBy');
            $table->timestamps();
        });

        Schema::create('ChangeManagement', function (Blueprint $table) {
            $table->id();
            $table->integer('ChangeID');
            $table->text('ChangeDescription');
            $table->integer('RequestedBy');
            $table->date('ChangeDate');
            $table->enum('ApprovalStatus', ['Pending', 'Approved', 'Rejected']);
            $table->timestamps();
        });

        // Security_DB
   

        Schema::create('Roles', function (Blueprint $table) {
            $table->id();
            $table->string('RoleName');
            $table->text('Description');
            $table->timestamps();
        });

        Schema::create('Permissions', function (Blueprint $table) {
            $table->id();
            $table->string('PermissionName');
            $table->text('Description');
            $table->timestamps();
        });

        Schema::create('UserRoles', function (Blueprint $table) {
            $table->id();
            $table->integer('UserID');
            $table->integer('RoleID');
            $table->timestamps();
        });

        Schema::create('RolePermissions', function (Blueprint $table) {
            $table->id();
            $table->integer('RoleID');
            $table->integer('PermissionID');
            $table->timestamps();
        });

        // Integration_DB
        Schema::create('ExternalSystems', function (Blueprint $table) {
            $table->id();
            $table->string('SystemName');
            $table->string('APIEndpoint');
            $table->enum('SystemStatus', ['Active', 'Inactive']);
            $table->dateTime('LastSyncDate');
            $table->timestamps();
        });

        Schema::create('APIEndpoints', function (Blueprint $table) {
            $table->id();
            $table->string('EndpointName');
            $table->string('EndpointURL');
            $table->enum('Method', ['GET', 'POST', 'PUT', 'DELETE']);
            $table->timestamps();
        });

        Schema::create('IoTDevices', function (Blueprint $table) {
            $table->id();
            $table->string('DeviceName');
            $table->string('DeviceType');
            $table->enum('DeviceStatus', ['Active', 'Inactive']);
            $table->dateTime('LastCommunicationDate');
            $table->timestamps();
        });

        Schema::create('FinanceProjectLink', function (Blueprint $table) {
            $table->id();
            $table->integer('FinanceRecordID');
            $table->integer('ProjectID');
            $table->timestamps();
        });

        Schema::create('EmployeeProjectLink', function (Blueprint $table) {
            $table->id();
            $table->integer('EmployeeID');
            $table->integer('ProjectID');
            $table->timestamps();
        });

        Schema::create('SupplyProductionLink', function (Blueprint $table) {
            $table->id();
            $table->integer('SupplyOrderID');
            $table->integer('ProductionOrderID');
            $table->timestamps();
        });

        Schema::create('CustomerProjectLink', function (Blueprint $table) {
            $table->id();
            $table->integer('CustomerID');
            $table->integer('ProjectID');
            $table->timestamps();
        });

        Schema::create('CustomerProcurementLink', function (Blueprint $table) {
            $table->id();
            $table->integer('CustomerID');
            $table->integer('ProcurementOrderID');
            $table->timestamps();
        });

        Schema::create('PartnerSupplyLink', function (Blueprint $table) {
            $table->id();
            $table->integer('PartnerID');
            $table->integer('SupplyOrderID');
            $table->timestamps();
        });

        Schema::create('ProcurementSupplyLink', function (Blueprint $table) {
            $table->id();
            $table->integer('PurchaseOrderID');
            $table->integer('SupplyOrderID');
            $table->timestamps();
        });

        Schema::create('UserPermissionsLink', function (Blueprint $table) {
            $table->id();
            $table->integer('UserID');
            $table->integer('PermissionID');
            $table->integer('RelatedRecordID');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('UserPermissionsLink');
        Schema::dropIfExists('ProcurementSupplyLink');
        Schema::dropIfExists('PartnerSupplyLink');
        Schema::dropIfExists('CustomerProcurementLink');
        Schema::dropIfExists('CustomerProjectLink');
        Schema::dropIfExists('SupplyProductionLink');
        Schema::dropIfExists('EmployeeProjectLink');
        Schema::dropIfExists('FinanceProjectLink');

        // Finance_DB
        Schema::dropIfExists('GeneralLedger');
        Schema::dropIfExists('AccountsReceivable');
        Schema::dropIfExists('AccountsPayable');
        Schema::dropIfExists('AssetManagement');
        Schema::dropIfExists('BudgetManagement');
        Schema::dropIfExists('TaxManagement');
        Schema::dropIfExists('FinancialConsolidation');

        // HRM_DB
        Schema::dropIfExists('Employees');
        Schema::dropIfExists('Payroll');
        Schema::dropIfExists('PerformanceManagement');
        Schema::dropIfExists('TalentManagement');
        Schema::dropIfExists('CareerLearning');

        // SupplyChain_DB
        Schema::dropIfExists('Procurement');
        Schema::dropIfExists('Inventory');
        Schema::dropIfExists('Warehouse');
        Schema::dropIfExists('Transportation');
        Schema::dropIfExists('SupplierManagement');

        // Production_DB
        Schema::dropIfExists('ProductionOrders');
        Schema::dropIfExists('ProductionPlanning');
        Schema::dropIfExists('QualityControl');
        Schema::dropIfExists('CapacityManagement');
        Schema::dropIfExists('ManufacturingReports');

        // ProjectManagement_DB
        Schema::dropIfExists('Projects');
        Schema::dropIfExists('Tasks');
        Schema::dropIfExists('Resources');
        Schema::dropIfExists('ProjectCosts');
        Schema::dropIfExists('ProjectReports');

        // CRM_DB
        Schema::dropIfExists('Customers');
        Schema::dropIfExists('Sales');
        Schema::dropIfExists('CustomerSupport');
        Schema::dropIfExists('MarketingCampaigns');

        // GRC_DB
        Schema::dropIfExists('RiskAssessments');
        Schema::dropIfExists('InternalAudits');
        Schema::dropIfExists('ComplianceManagement');

        // Analytics_DB
        Schema::dropIfExists('Reports');
        Schema::dropIfExists('Dashboards');
        Schema::dropIfExists('DataForecasting');

        // Procurement_DB
        Schema::dropIfExists('PurchaseOrders');
        Schema::dropIfExists('Contracts');
        Schema::dropIfExists('SupplierRelations');

        // PartnerManagement_DB
        Schema::dropIfExists('Partners');
        Schema::dropIfExists('PartnerInteraction');

        // DocumentManagement_DB
        Schema::dropIfExists('Documents');
        Schema::dropIfExists('DocumentVersions');
        Schema::dropIfExists('ChangeManagement');

        // Security_DB
        Schema::dropIfExists('Roles');
        Schema::dropIfExists('Permissions');
        Schema::dropIfExists('UserRoles');
        Schema::dropIfExists('RolePermissions');

        // Integration_DB
        Schema::dropIfExists('ExternalSystems');
        Schema::dropIfExists('APIEndpoints');
        Schema::dropIfExists('IoTDevices');
    }
};
