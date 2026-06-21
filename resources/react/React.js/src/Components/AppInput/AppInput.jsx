import React from 'react'

export default function Input({ titleLabel, textPlaceholder , typeInput , inputVal , chnageValue }) {
    return (
        <div className='flex flex-col gap-2'>
            <label htmlFor="" className=' font-semibold'>{titleLabel}</label>
            <input type={typeInput} placeholder={textPlaceholder} className='text-sm border border-ColorBorder p-3 rounded-sm text-Secondary focus:border-Primary outline-Primary' value={inputVal} onChange={(e)=>chnageValue(e)} />
        </div>
    )
}
