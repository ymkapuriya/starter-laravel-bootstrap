/**
 * Custom js file
 */

const init = () => {
    $('.toast').toast({})

    $('form.form-confirm').submit(function () {
        return confirm('Are you sure you want to perform this operation?');
    })
}