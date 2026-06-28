import React from 'react'

export default function Input({ titleLabel, placeholder, type, inputVal, onChange, maxLength }) {
    return (
        <div className='flex flex-col gap-2'>
            <label htmlFor="" className=' font-semibold'>{titleLabel}</label>
            <input maxLength={maxLength} type={type} placeholder={placeholder} className='text-right text-sm border border-ColorBorder p-3 rounded-sm text-Secondary focus:border-Primary outline-Primary' value={inputVal} onChange={onChange} />
        </div>
    )
}
