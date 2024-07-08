import { initializeSelect2 } from "./select2-initialize";

document.addEventListener('DOMContentLoaded', function () {
    initializeSelect2();

    document.getElementById('add-item').addEventListener('click', function () {
        const container = document.getElementById('items-container');
        const index = container.children.length;
        const newItem = document.createElement('div');
        newItem.classList.add('row', 'g-3', 'align-items-center', 'item');

        let options = '<option selected>Выберете оборудование или инструмент</option>';
        materialAssets.forEach(asset => {
            options += `<option value="${asset.id}">${asset.name}</option>`;
        });

        newItem.innerHTML = `
            <div class="col-auto">
                <label for="material_asset_id_${index}" class="form-label">Оборудование</label>
                <select class="form-select form-select-sm form-select2-sm" name="material_asset_id[]" id="material_asset_id_${index}">
                    ${options}
                </select>
            </div>
            <div class="col-auto">
                <label for="quantity_${index}" class="form-label">Сколько</label>
                <input type="text" class="form-control form-control-sm" name="quantity[]" id="quantity_${index}" placeholder="сколько">
            </div>
        `;

        container.appendChild(newItem);
        initializeSelect2();
    });
});
